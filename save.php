<?PHP
if ($_POST && isset($_POST['email'], $_POST['message'])) {
    $email   = htmlspecialchars($_POST['email'],ENT_QUOTES);
    $subject = htmlspecialchars($_POST['subject'] ? $_POST['subject'] : 'No subject',ENT_QUOTES);
    $message = htmlspecialchars($_POST['message'],ENT_QUOTES);
    if (!$email || !preg_match("/^\S+@\S+$/", $email)) {
        $error = "Please enter a valid Email address";
    } elseif (!$message) {
        $error = "No message";
    } else {
        try {
            $conn = mysqli_connect('localhost', $username, $password);
            $sql  = "INSERT INTO queries.table (email, subject, message) VALUES ($email, $subject, $message)";
            $conn->query($sql);
            mysqli_close($conn);
        }
        catch (Exception $e) {
            // Handle error here
        }
        // send email and redirect
        $to = "query@ciber.com";
        if (!$subject)
            $subject = "Query about Eylea";
        $headers = "From: management@ciber.com" . "\r\n";
        mail($to, $subject, $message, $headers);
        header("Location: index.html");
        exit;
    }
} else {
    header("Location: index.html");
}
?>