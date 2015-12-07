<?php namespace App;


use App\Events\NameWasDrawn;
use App\Events\NewListWasCreated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class Giftlist extends Model {

    protected $fillable = [
        'email',
        'list',
        'activation'
    ];

    /**
     * Create the new list
     *
     * @param $giftlist
     * @internal param $request
     * @return Giftlist
     */
    public function createList($giftlist)
    {
        $activationCode = str_random(40);

        $giftlist->activation = $activationCode;
        $giftlist->save();

        return $giftlist;
    }

    /**
     * Find the list by name
     *
     * @param $list
     * @return mixed
     */
    public function findListByName($list)
    {
        return Giftlist::where('list', $list)->first();
    }

    /**
     * Find the list by id
     *
     * @param $id
     * @return mixed
     */
    public function findListById($id)
    {
        return $this->findOrFail($id);
    }

    /**
     * Save a guest to the pivot table
     *
     * @param Guest $guest
     * @return Model
     */
    public function addGuest(Guest $guest)
    {
        // Assign a guestid equal to the number of guests in the relationship
        // The guestid is assigned to the registering guest and is used
        // when picking names from the pickNames selection method
        $guest->guestid = count($this->guests);

        return $this->guests()->save($guest);
    }

    /**
     * giflist has many guests
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function guests()
    {
        return $this->hasMany('App\Guest')->orderBy('guestid', 'asc');
    }

    /**
     * Pick the names for secret santa
     *
     * @param Giftlist $giftlist
     * @return bool
     */
    public function pickNames(Giftlist $giftlist)
    {
        // Find out how many guests are in the draw
        $guestCount = count($giftlist->guests);

        // grab the guest list
        $recipient = $giftlist->guests()->get();

        foreach ($giftlist->guests as $giver)
        {
            // get the guestid of the current guest
            $recipientId = $giver->guestid;

            // increment the guestid, which becomes the recipient of guests gift
            $recipientId++;

            // Last guest needs to pick first guest's geustId
            if($guestCount == 1) { $recipientId = 0;}

            // assign receiver to giver
            $giver->giving_to = $recipient[ $recipientId ]['guest_name'];
            $giver->save();

            Event::fire(new NameWasDrawn($giver));

            // decrement guestCount until there is only one left
            $guestCount --;
        }
        return true;
    }


}