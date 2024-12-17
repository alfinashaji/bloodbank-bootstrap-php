
<?php
// Include the database connection
require("./lib/db/conn.php");

try {
    // Use the existing connection
    $pdo = $db->conn;

    // Prepare and execute the query
    $stmt = $pdo->prepare("SELECT * FROM myguests"); // Replace 'myguests' with your actual table name
    $stmt->execute();

    // Fetch all data
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <script src="https://kit.fontawesome.com/d23efd4b93.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="css/main.css" rel="stylesheet" type="text/css"/>
  </head>
<body>
<?php
  require("./header.php")
  ?>
<!-- nav end -->

<!-- banner start -->

<div class="container">
<div class="row">
<div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 mt-5">
    <label for="exampleInputEmail1" class="form-label fontstype">Location</label>
        <div class="input-group">
        <input type="text" class="form-control" placeholder="Search ......" aria-label="Recipient's username">
      </div>
</div>
<div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 pt-5 text-center">
  <p class="fontstype">Available/Un Available</p>
  <input type="checkbox" hidden="hidden" id="username">
  <label class="switch" for="username"></label>
</div>


<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-3 mt-sm-3 mt-md-3 mt-lg-4 mt-xl-5">
    <div class="row align-item-center">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3 mt-sm-3 mt-md-3 mt-lg-5 mt-xl-5">
         <div class="d-flex justify-content-end gap-2">
          <button type="button" class="btn btn-light buttonsselect btntick" onclick="selectBloodGroup(this, 'A+')">A+
            <label class="custom-radio">
              <input type="radio" name="radio" value="A+">
              <span class="radio-btn"><i class="las la-check butn">
                </i>
          </button>

          <button type="button" class="btn btn-light buttonsselect btntick" onclick="selectBloodGroup(this, 'A-')">A-
            <label class="custom-radio">
              <input type="radio" name="radio" value="A-">
              <span class="radio-btn"><i class="las la-check butn">
                </i>
          </button>
          
          <button type="button" class="btn btn-light buttonsselect btntick" onclick="selectBloodGroup(this, 'B+')">B+
            <label class="custom-radio">
              <input type="radio" name="radio" value="B+">
              <span class="radio-btn"><i class="las la-check butn">
                </i>
          </button>
          
          <button type="button" class="btn btn-light buttonsselect btntick" onclick="selectBloodGroup(this, 'B-')">B-
            <label class="custom-radio">
              <input type="radio" name="radio" value="B-">
              <span class="radio-btn"><i class="las la-check butn">
                </i>
          </button>

          <button type="button" class="btn btn-light buttonsselect btntick" onclick="selectBloodGroup(this, 'O+')">O+
            <label class="custom-radio">
              <input type="radio" name="radio" value="O+">
              <span class="radio-btn"><i class="las la-check butn">
                </i>
          </button>

          <button type="button" class="btn btn-light buttonsselect btntick" onclick="selectBloodGroup(this, 'O-')">O-
            <label class="custom-radio">
              <input type="radio" name="radio" value="O-">
              <span class="radio-btn"><i class="las la-check butn">
                </i>
          </button>
          
          <button type="button" class="btn btn-light buttonsselect btntick" onclick="selectBloodGroup(this, 'Ab+')">Ab+
            <label class="custom-radio">
              <input type="radio" name="radio" value="Ab+">
              <span class="radio-btn"><i class="las la-check butn">
                </i>
          </button>

          <button type="button" class="btn btn-light buttonsselect btntick" onclick="selectBloodGroup(this, 'Ab-')">Ab-
            <label class="custom-radio">
              <input type="radio" name="radio" value="Ab-">
              <span class="radio-btn"><i class="las la-check butn">
                </i>
          </button>
          </div>


          

       
          </div>
          
        </div>       
</div>
</div>
</div>
<!-- banner end -->

<!-- profile strat -->

<div class="container">
    <div class="row">
        <?php if (!empty($results)): ?>
            <?php foreach ($results as $guest): ?>
              <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4">
              <div 
    class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-12 mt-5 pt-3 pb-3 rounded-4 border border-opacity-10 ps-3 bordersetting"
    data-actions="<?php echo htmlspecialchars($guest['actions']); ?>"
    data-blood-group="<?php echo htmlspecialchars($guest['blood']); ?>">
                    <div class="row align-items-center">
                        <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-5 pt-2 positionfixing">
                            <img class="img-fluid rounded-4" src="images/alfina.png" alt="Profile Picture"/>
                            <div 
                        class="dot" 
                        style="background-color: <?php echo $guest['actions'] === 'active' ? 'green' : 'red'; ?>;">
                    </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-5 mt-4">
                            <h6 class="namearrangement"><?php echo htmlspecialchars($guest['fullname']); ?></h6>
                            <h6 class="details">Blood Group: <?php echo htmlspecialchars($guest['blood']); ?></h6>
                            <h6 class="details"><?php echo htmlspecialchars($guest['locations']); ?></h6>
                            <h6 class="details"><i class="fa-solid fa-phone"></i> <?php echo htmlspecialchars($guest['phoneno']); ?></h6>
                        </div>
                        <div class="col-2 col-sm-2 col-md-1 col-lg-1 col-xl-2">
                            <i class="fa-brands fa-whatsapp fonticon"></i>
                        </div>
                    </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <p>No data available.</p>
            </div>
        <?php endif; ?>
    </div>
</div>
<script>

document.getElementById('username').addEventListener('change', function () {
    const isChecked = this.checked; // Get checkbox state
    const userCards = document.querySelectorAll('.bordersetting'); // Select all user cards

    userCards.forEach(card => {
        const actionStatus = card.getAttribute('data-actions'); // Get the user's status from the data attribute
        if ((isChecked && actionStatus === 'inactive') || (!isChecked && actionStatus === 'active')) {
            card.style.display = 'none'; // Hide card if it doesn't match the filter
        } else {
            card.style.display = 'block'; // Show card if it matches the filter
        }
    });
});


function selectBloodGroup(button, bloodType) {
    document.querySelectorAll('.btntick').forEach(btn => btn.classList.remove('active'));
    button.classList.add('active');
    document.querySelector(`input[name="radio"][value="${bloodType}"]`).checked = true;
    const userCards = document.querySelectorAll('.bordersetting');
    userCards.forEach(card => {
        const cardBloodGroup = card.getAttribute('data-blood-group');
        if (cardBloodGroup === bloodType) {
            card.style.display = 'block'; // Show card if it matches the blood group
        } else {
            card.style.display = 'none'; // Hide card if it doesn't match
        }
    });
}

const locationInput = document.querySelector('.form-control[placeholder="Search ......"]');
    locationInput.addEventListener('input', function () {
        const searchQuery = this.value.toLowerCase(); // Get search query in lowercase
        const userCards = document.querySelectorAll('.bordersetting'); // Select all user cards

        userCards.forEach(card => {
            const cardLocation = card.querySelector('.details:nth-child(3)').textContent.toLowerCase();
            if (cardLocation.includes(searchQuery)) {
                card.style.display = 'block'; // Show card if location matches
            } else {
                card.style.display = 'none'; // Hide card if location doesn't match
            }
        });
    });
</script> 
</body>
</html>



