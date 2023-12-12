<?php
  require_once("../../model/notificationModel.php");
  session_start();
  sendNotification($username, $message, $user_type); 
    
  $userType = '';
  if (isset($_SESSION['userType'])) {
      $userType = $_SESSION['userType'];
  } 
  elseif (isset($_COOKIE['userType'])) {
      $userType = $_COOKIE['userType'];
  }

  if (empty($userType)) {
    echo json_encode(["error" => "User type not set in the session"]);
} else {
    $notifications = getNotification($userType);

    if ($notifications === "No Notifications Found") {
        echo json_encode(["message" => "No notifications found for $userType"]);
    } else {
        
        echo json_encode(["notifications" => $notifications]);
    }
}

?>