<?php
session_start();
include 'header.php';
include 'db.php';

$db = new Database();
$pdo = $db->getPDO();

try {
    $sql = "SELECT * FROM products ORDER BY created_at DESC LIMIT 4";
    $stmt = $pdo->query($sql);
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit;
}
?>

  <div class="landing-home">
    <img src="./assets/uploads/hero-image2.jpg" class="home-landing-image" alt="" />
    <div class="landing-text">
      <h4 class="landing-header">
        Nature's Embrace: A Year of Camping Adventures
      </h4>
      <p class="landing-content">
        As we celebrate one year of camping bliss, the great outdoors has become our second home. From the rustling
        leaves in the serene woods to the crackling warmth of the campfire, each trip has woven a tapestry of memories.
        Whether under the star-studded canvas or waking up to the soft glow of dawn, camping has not just been a
        getaway; it's been a journey of self-discovery and connection with the raw beauty of nature. Here's to another
        year of pitching tents, roasting marshmallows, and finding solace in the simplicity of the wild.Cheers to the
        great outdoors and the countless stories yet to unfold under the open sky!
      </p>
      </p>
    </div>
  </div>
  <p class="products-title">Our Best Seller Products</p>
  <div class="slider">
  <div class="slide-a">
      <?php foreach ($products as $product): ?>
        <div style="background-image: url('<?php echo htmlspecialchars($product['image_url']); ?>')">
          <span class="title"><?php echo htmlspecialchars($product['name']); ?></span>
        </div>
      <?php endforeach; ?>
    </div>
    <span class="icon-arrow_back" id="prev"></span>
    <span class="icon-arrow_forward" id="next"></span>
  </div>


  <div class="details-home">
    <div class="details-text">
      <h3 class="details-header">
        Tranquility Unleashed: The Peaceful Symphony of Camping
      </h3>
      <p class="details-content">
        Camping, where the hustle of the world fades into a distant murmur, is a sanctuary for the soul. As the canvas
        of the night sky unfolds its myriad stars, a profound serenity settles over the campsite. The crackling campfire
        whispers tales of warmth and camaraderie, and the nocturnal chorus of crickets becomes a lullaby for the weary
        mind. <br />
        <br />
        In the heart of nature, the symphony of rustling leaves, gently flowing streams, and distant wildlife creates a
        harmonious melody, drowning out the cacophony of modern life. The absence of urban clamor allows the mind to
        untangle, finding solace in the rhythmic heartbeat of the wilderness.
        <br />
        <br />
        Camping, in its essence, is a pilgrimage to peace—a journey where the stillness of the surroundings mirrors the
        calmness within. As the sun sets and paints the horizon with hues of orange and pink, one can't help but marvel
        at the profound beauty of a world unspoiled. It's in these tranquil moments that the magic of camping reveals
        itself, offering a sanctuary where peace reigns supreme.
      </p>
    </div>
    <img src="./assets/uploads/woods.jpg" alt="" class="details-image" />
  </div>

<script>
let arrowIconLeft = `<svg height="50px" id="Layer_1" style="enable-background:new 0 0 50 50;" version="1.1" viewBox="0 0 512 512" width="50px" color="#fff" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <polygon points="352,115.4 331.3,96 160,256 331.3,416 352,396.7 201.5,256"/>
</svg>`;
let slides = document.querySelectorAll('.slide-ana div');
let slideSayisi = slides.length;


let prev = document.getElementById('prev');
let next = document.getElementById('next');
prev.innerHTML = arrowIconLeft;
next.innerHTML = arrowIconLeft;
next.querySelector('svg').style.transform = 'rotate(180deg)';


for (let index = 0; index < slides.length; index++) {
    const element = slides[index];
    element.style.transform = "translateX("+100*(index)+"%)";
}
let loop = 0 + 1000*slideSayisi;

function goNext(){
    loop++;
            for (let index = 0; index < slides.length; index++) {
                const element = slides[index];
                element.style.transform = "translateX("+100*(index-loop%slideSayisi)+"%)";
            }
}

function goPrev(){
    loop--;
            for (let index = 0; index < slides.length; index++) {
                const element = slides[index];
                element.style.transform = "translateX("+100*(index-loop%slideSayisi)+"%)";
            }
}

next.addEventListener('click',goNext);
prev.addEventListener('click',goPrev);
document.addEventListener('keydown',function(e){
    if(e.code === 'ArrowRight'){
        goNext();
    }else if(e.code === 'ArrowLeft'){
        goPrev();
    }
});



</script>
<?php include 'footer.php' ?>