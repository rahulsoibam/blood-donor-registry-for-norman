<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta
      name="description"
      content="A fully featured admin theme which can be used to build CRM, CMS, etc."
    />

    <!-- Libs CSS -->
    <link rel="stylesheet" href="assets/fonts/feather/feather.min.css" />
    <link rel="stylesheet" href="assets/libs/highlight.js/styles/vs2015.css" />
    <link rel="stylesheet" href="assets/libs/quill/dist/quill.core.css" />
    <link
      rel="stylesheet"
      href="assets/libs/select2/dist/css/select2.min.css"
    />
    <link
      rel="stylesheet"
      href="assets/libs/flatpickr/dist/flatpickr.min.css"
    />

    <!-- Theme CSS -->

    <link
      rel="stylesheet"
      href="assets/css/theme.min.css"
      id="stylesheetLight"
    />

    <link
      rel="stylesheet"
      href="assets/css/theme-dark.min.css"
      id="stylesheetDark"
    />

    <title>Blood Donor Registry</title>
    <style>
      body {
        display: none;
      }
    </style>
  </head>
  <body>
<?php
if (isset($_REQUEST['register-button'])) {
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
    $servername = "localhost";
    $username = "root";
    $password = "0586274393142857";
    $dbname = "blood_donor";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn -> connect_error) { 
      $error = 1;
      exit;
    }
 
    // Escape user inputs for security
    $full_name = $conn->real_escape_string($_REQUEST['full-name']);
    $blood_group = $conn->real_escape_string($_REQUEST['blood-group']);
    $email = $conn->real_escape_string($_REQUEST['email']);
    $phone = $conn->real_escape_string($_REQUEST['phone']);
    $address = $conn->real_escape_string($_REQUEST['address']);
 
    // Attempt insert query execution
    $sql = "INSERT INTO donor (full_name, blood_group, email, phone, address) VALUES ('$full_name', '$blood_group', '$email', '$phone', '$address')";
    if($conn->query($sql) === true){
        $success = 1;
    } else{
        $error = 1;
        exit;
    }
    // Close connection
    $conn->close();
  }
?>
    <div
      class="users"
      data-toggle="lists"
      data-lists-values='["uid", "full-name", "blood-group", "email", "phone", "address"]'
    >
      <nav class="navbar navbar-expand-lg navbar-light" id="topnav">
        <div class="container-fluid">
          <!-- Brand -->
          <a
            class="navbar-brand mr-auto"
            style="vertical-align: middle"
            href="/"
          >
            <img
              src="assets/img/norman.png"
              alt="..."
              class="navbar-brand-img"
            />
            <!-- <span style="vertical-align: middle;">Blood Donor Registry - </span> -->
            <span style="vertical-align: middle;">Register A New Donor</span>
          </a>

          <!-- User -->
          <div class="navbar-user">
            <!-- Toggle -->
            <a
              href="#"
              class="avatar avatar-sm"
              data-toggle="tooltip"
              data-placement="bottom"
              title="Register New Donor"
            >
              <img
                src="assets/img/add.png"
                alt="..."
                class="avatar-img rounded-circle"
              />
            </a>
          </div>
        </div>
        <!-- / .container -->
      </nav>
      <?php
        if (isset($success)) {
          echo "<div class=\"alert alert-success\" role=\"alert\">Donor registered successfully</div>";
        }
        if (isset($error)) {
          echo "<div class=\"alert alert-error\" role=\"alert\">An error occurred while registering donor. Please try again later</div>";
        }
      ?>
      <!-- MAIN CONTENT
    ================================================== -->
      <div class="main-content" style="margin-top: 25px;">
        <!-- CARDS -->
        <div class="container-fluid">
          <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-row">
              <div class="form-group col-md-10">
                <label for="full-name">Full Name</label>
                <input
                  type="text"
                  class="form-control"
                  name="full-name"
                  placeholder="e.g. Norman Elangbam, Chongtham Samananda Singh"
                  required
                />
              </div>
              <div class="form-group col-md-2">
                <label for="blood-group">Blood Group</label>
                <select name="blood-group" class="form-control">
                  <option selected>A+</option>
                  <option>A-</option>
                  <option>B+</option>
                  <option>B-</option>
                  <option>AB-</option>
                  <option>AB-</option>
                  <option>O+</option>
                  <option>O-</option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input
                  type="email"
                  class="form-control"
                  name="email"
                  placeholder="e.g. example@gmail.com"
                  required
                />
              </div>
              <div class="form-group col-md-6">
                <label for="phone">Phone Number</label>
                <input
                  type="tel"
                  class="form-control"
                  name="phone"
                  placeholder="7005010101"
                  required
                />
              </div>
            </div>
            <div class="form-group">
              <label for="addresss">Address</label>
              <input
                type="text"
                class="form-control"
                name="address"
                placeholder="Thangmeiband Yumnam Leikai"
                required
              />
            </div>
            <button
              type="submit"
              name="register-button"
              class="btn btn-success"
            >
              Register
            </button>
          </form>
          <!-- <form>
            <div class="form-group">
              <label for="exampleFormControlInput1">Email address</label>
              <input
                type="email"
                class="form-control"
                id="exampleFormControlInput1"
                placeholder="name@example.com"
              />
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Example select</label>
              <select class="form-control" id="exampleFormControlSelect1">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect2"
                >Example multiple select</label
              >
              <select
                multiple
                class="form-control"
                id="exampleFormControlSelect2"
              >
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Example textarea</label>
              <textarea
                class="form-control"
                id="exampleFormControlTextarea1"
                rows="3"
              ></textarea>
            </div>
          </form> -->
        </div>
        <!-- / .row -->
      </div>

      <!-- / .main-content -->
    </div>

    <!-- JAVASCRIPT
    ================================================== -->
    <!-- Libs JS -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/chart.js/dist/Chart.min.js"></script>
    <script src="assets/libs/highlightjs/highlight.pack.min.js"></script>
    <script src="assets/libs/flatpickr/dist/flatpickr.min.js"></script>
    <script src="assets/libs/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
    <script src="assets/libs/list.js/dist/list.min.js"></script>
    <script src="assets/libs/quill/dist/quill.min.js"></script>
    <script src="assets/libs/dropzone/dist/min/dropzone.min.js"></script>
    <script src="assets/libs/select2/dist/js/select2.min.js"></script>
    <script src="assets/libs/chart.js/Chart.extension.min.js"></script>

    <!-- Theme JS -->
    <script src="assets/js/theme.min.js"></script>
    <script>
      // var options = {
      //   valueNames: [
      //     "uid",
      //     "full-name",
      //     "blood-group",
      //     "email",
      //     "phone",
      //     "address"
      //   ]
      // };

      // var userList = new List("users", options);
    </script>
  </body>

  <!-- Mirrored from dashkit.goodthemes.co/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Feb 2019 21:24:29 GMT -->
</html>
