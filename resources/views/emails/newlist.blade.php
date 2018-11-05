<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>New Secret Santa List</title>
</head>
<body>
  <h2>Your new Secret Santa list</h2>

  <div>
        Thank you for creating a new Secret Santa list.
        <p>Your list name is {{ $listName }}</p>
        <hr/>
        Please follow this link to add names to your list {{ URL::to('addguest') . ('/') . $listLink }}
        <p>Your guests simply need to add their email to the list to particpate</p>
        <p>Once everyone has entered their names click here to randomly assign gift givers to gift receivers
        {{ URL::to('showguests'). ('/') . $listLink . ('/') . $activationCode }}</p>
  </div>


</body>
</html>