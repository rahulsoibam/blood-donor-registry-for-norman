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
            <span style="vertical-align: middle;">Blood Donor Registry</span>
          </a>

          <!-- User -->
          <div class="navbar-user">
            <!-- Toggle -->
            <a
              href="register.php"
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

      <!-- MAIN CONTENT
    ================================================== -->
      <div class="main-content">
        <!-- CARDS -->
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 col-xl-12" style="padding: 0;">
              <div class="table-responsive mb-0">
                <form class="form-inline mr-4 d-md-flex">
                  <div
                    class="input-group input-group-flush input-group-merge show"
                    style="padding-left: 24px;"
                  >
                    <!-- Input -->
                    <input
                      type="search"
                      class="form-control form-control-prepended search"
                      placeholder="Search"
                      aria-label="Search"
                      aria-expanded="true"
                    />
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fe fe-search"></i>
                      </div>
                    </div>
                  </div>
                </form>

                <table class="table table-sm table-nowrap card-table">
                  <thead>
                    <tr>
                      <th>
                        <a href="#" class="text-muted sort" data-sort="uid">
                          Sl. No.
                        </a>
                      </th>
                      <th>
                        <a
                          href="#"
                          class="text-muted sort"
                          data-sort="full-name"
                        >
                          Full Name
                        </a>
                      </th>
                      <th>
                        <a
                          href="#"
                          class="text-muted sort"
                          data-sort="blood-group"
                        >
                          Blood Group
                        </a>
                      </th>
                      <th>
                        <a href="#" class="text-muted sort" data-sort="email">
                          Email
                        </a>
                      </th>
                      <th>
                        <a href="#" class="text-muted sort" data-sort="phone">
                          Phone
                        </a>
                      </th>
                      <th>
                        <a href="#" class="text-muted sort" data-sort="address">
                          Address
                        </a>
                      </th>
                    </tr>
                  </thead>
                  <tbody class="list">
                  <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "0586274393142857";
                    $dbname = "blood_donor";
                    
                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    
                    // Check connection
                    if ($conn -> connect_error) { 
                      die("Connection failed: " . $conn -> connect_error); 
                    }
                    $sql = "SELECT id, full_name, blood_group, email, phone, address FROM donor"; 
                    $result = $conn -> query($sql); 
                    if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) { 
                        echo "<tr><td class=\"uid\">" . $row["id"]. "</td>" . "<td class=\"full-name\">" . $row["full_name"] . "</td>" . "<td class=\"blood-group\">" . $row["blood_group"] . "</td>" . "<td class=\"email\">" . "<a href=\"mailto:" . $row["email"]. "\">" . $row["email"] . "</a>" . "</td>" . "<td class=\"phone\">" . "<a href=\"tel:" . $row["phone"]. "\">" . $row["phone"] . "</a>" . "</td>" . "<td class=\"address\">" . $row["address"] . "</td>" . "</tr>"; 
                      } 
                    } else {
                        echo "0 results"; 
                      } 
                      
                      $conn -> close(); 
                  ?>
                </tbody>  
                </table>
              </div>
            </div>
          </div>
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
