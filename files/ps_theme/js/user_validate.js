


function check_username($username) {
  $username = trim($username); // strip any white space
  $response = array(); // our response
  
  // if the username is blank
  if (!$username) {
    $response = array(
      'ok' => false, 
      'msg' => "Please specify a username");
      
  // if the username does not match a-z or '.', '-', '_' then it's not valid
  } else if (!preg_match('/^[a-z0-9.-_]+$/', $username)) {
    $response = array(
      'ok' => false, 
      'msg' => "Your username can only contain alphanumerics and period, dash and underscore (.-_)");
      
  // this would live in an external library just to check if the username is taken
  } else if (username_taken($username)) {
    $response = array(
      'ok' => false, 
      'msg' => "The selected username is not available");
      
  // it's all good
  } else {
    $response = array(
      'ok' => true, 
      'msg' => "This username is free");
  }

  return $response;        
}
