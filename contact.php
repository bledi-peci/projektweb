<?php 
include 'header.php';
include 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    
    $sql = "INSERT INTO contact_inquiries (name, email, message) VALUES (?, ?, ?)";
    
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $email, $message]);
        echo "<p>Message sent successfully!</p>";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
  <div class="contact-page">
    <div class="contact-wrapper">
      <h1 class="contact-header">Contact Page</h1>
      <form action="contact.php" method="post">
          <input type="text" name="name" placeholder="Full Name*" required />
          <input type="email" name="email" placeholder="E-Mail Address*" required />
          <input type="number" name="phone" placeholder="Phone Number" />
          <input type="text" name="subject" placeholder="Subject" />
          <textarea name="message" class="full-width" placeholder="Message"></textarea>
          <button type="submit" class="submit-button">Send a message</button>
      </form>

    </div>
  </div>
<?php include 'footer.php'?>