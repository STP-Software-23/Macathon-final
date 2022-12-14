
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Regestration</title>
  <!-- CSS -->

  <!-- FONTAWESOME -->
  <script src="https://kit.fontawesome.com/7792a39114.js" crossorigin="anonymous"></script>
  <!-- BOOTSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="./style/style.css" />
</head>

<body>
  <div id="page-wrapper" class="container mt-mb-5 ">
    <div class="wrapper wrapper--w680">
      <div class="" id="card">
        <div id="cardbody" class="card-body login-box row adjust-card">



          <div class="col-lg-6">
            <form id="form" class="card" method="POST" action="../loadMacathonForm.php" enctype="multipart/form-data">
              <h1>
                <span class="headline">M</span>acthon 4.0
              </h1>
              <h5>Autonomous Vehicles Race</h5>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <i class="fa-solid fa-user icon"></i>
                  <input type="text" name="name" class="form-control" placeholder="Name" required>
                </div>
                <div class="form-group col-md-6">
                  <i class="fa-solid fa-phone icon"></i>
                  <input name="phone" type="text" class="form-control" placeholder="phone" required>
                  <small id="error-phone"></small>
                </div>
              </div>

              <div class="form-group">
                <i class="fa-solid fa-envelope icon"></i>
                <input type="email" name="email" class="form-control" id="inputAddress" placeholder="E-mail" required>
                <small id="error-phone"></small>
              </div>

              <div class="form-group">
                <i class="fa-solid fa-marker icon"></i>
                <input type="text" name="faculty" class="form-control mt-2 " placeholder="Faculty" required>
              </div>
              <div class="form-group">
                <i class="fa-regular fa-calendar-days"></i>
                <select name="graduationYear" id="graduationYear" class="form-control">
                  <option selected>Graduation year:</option>
                  <option value="volvo">2022</option>
                  <option value="saab">2023</option>
                  <option value="mercedes">2024</option>
                  <option value="audi">2025</option>
                </select>
              </div>


              <div class="form-group mb-3">
                <i class="fa-solid fa-building-columns icon"></i>
                <select name="university" class="form-control" id="inputGroupSelect02">
                  <option selected>Choose...</option>
                  <option value="Cairo University">Cairo University</option>
                  <option value="Ain Shams University">Ain Shams University</option>
                  <option value="Nile University">Nile University</option>
                  <option value="Helwan University">Helwan University</option>
                  <option value="Al-Azhar University">Al-Azhar University</option>
                  <option value="Al-Matarya University">Al-Matarya University</option>
                  <option value="Banha University">Banha University</option>
                  <option value="other">other...</option>
                </select>


              </div>
              <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01"><i class="fa-solid fa-file"> CV</i>
                </label>
                <input type="file" name="cv" class="form-control " id="inputGroupFile01" required>
              </div>

              <div class="mb-3">
                <label for="">Why do you join the camp?</label>
                <textarea name="whyJoin" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>
              <div class="mb-3">
                <label for="">If you have any experiance in AI competition, mention it:</label>
                <textarea name="experiance" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>

              <div class="status">
                <p>You're applying as:</p>
                <div class="form-check">
                  <input class="form-check-input" name="role" type="radio" name="exampleRadios" id="exampleRadios1" value="1"
                    onClick="addFieldTL()">
                  <label class="form-check-label" for="exampleRadios1" required>
                    Team Leader
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" name="role" type="radio" name="exampleRadios" id="exampleRadios2" value="0"
                    onClick="checkField()">
                  <label class="form-check-label" for="exampleRadios2">
                    Individual
                  </label>
                </div>
              </div>

              <div id="adds" class="adds-class"></div>



              <button type="submit" name=submit class="btn btn-danger container">Submit</button>

            </form>
          </div>

        </div>
      </div>
    </div>
  </div>

  <!-- there was 3 MISSING divs colsings 7sby allah   new  -->

  
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
    <script src="./scripts.js"></script>
  
</body>

</html>

