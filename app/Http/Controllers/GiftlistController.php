<?php

namespace App\Http\Controllers;

use App\Events\NewListWasCreated;
use App\Giftlist;
use App\Guest as Guest;
use App\Http\Requests;
use App\Http\Requests\GuestRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\GiftlistRequest;
use Illuminate\Support\Facades\Event;

class GiftlistController extends Controller
{


    /**
     * @var Giftlist
     */
    protected $giftlist;

    public function __construct(Giftlist $giftlist)
    {

        $this->giftlist = $giftlist;
    }


    /**
     * persist the new list
     *
     * @param GiftlistRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCreateList(GiftlistRequest $request)
    {
        $giftlist = $this->giftlist->createList(new Giftlist($request->all()));

        $giftlist->addGuest(new Guest($request->all()));

        Event::fire( new NewListWasCreated($giftlist));

        flash()->overlay('Success', 'Your Secret Santa list has been created. Check your email.');

        return redirect()->back();
    }

    /**
     * Return view to allow guest to enter email
     *
     * @param $request
     * @internal param $list
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAddGuest($request)
    {
        $giftlist = $this->giftlist->findListByName(urldecode($request));

        return view('addguest', compact('giftlist', $giftlist));
    }

    /**
     * Add a guest to the list
     *
     * @param GuestRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postAddGuest(GuestRequest $request)
    {
        $guest = new Guest($request->all());

        $this->giftlist->findListById($request->listId)->addGuest($guest);

        flash()->overlay('Success', 'Your name has been added to the Secret Santa List. You can continue to add other email addresses to the list');

        return redirect()->back();
    }

    /**
     * Show the names in a secret santa list
     *
     * @param $request
     * @internal param $list
     * @internal param $activationCode
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getShowGuestList($request)
    {
        $giftlist = $this->giftlist->findListByName(urldecode($request));

        return view('showguestlist', compact('giftlist', $giftlist));
    }


    /**
     * Match givers with receivers and send to email
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postSendList(Request $request)
    {
        $giftlist = $this->giftlist->findListByName(urldecode($request->listName));

        $this->giftlist->pickNames($giftlist);

        return view('finished');
    }


}
