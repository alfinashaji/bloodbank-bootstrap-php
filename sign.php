<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link href="css/main.css" rel="stylesheet" type="text/css" />
    <script src="https://www.gstatic.com/firebasejs/4.3.1/firebase.js"></script>
    <!-- Firebase App (the core Firebase SDK) -->
    <script
      type="module"
      src="https://www.gstatic.com/firebasejs/9.6.1/firebase-app.js"
    ></script>
    <!-- Firebase Authentication -->
    <script
      type="module"
      src="https://www.gstatic.com/firebasejs/9.6.1/firebase-auth.js"
    ></script>
  </head>
  <body>
    <div class="container bgcolour">
      <div class="row justify-content-center align-items-center heightadjust">
        <div class="col col-sm-6 col-md-6 col-lg col-xl-6 col-xxl-6">
          <div
            class="col py-5 ps-4 pe-4 rounded-5 border border-success border-opacity-10 form"
          >
            <h4 class="text1 text-center">SIGN IN</h4>
            <form>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label fontstype"
                  >Phone</label
                >
                <input
                  type="email"
                  class="form-control formarrangement"
                  id="exampleInputEmail1 phone-number"
                  aria-describedby="emailHelp"
                />
              </div>

              <div class="d-grid gap-2 pt-4">
                <button
                  class="btn formarrangement colourselect submitbtn fontstype"
                  type="button"
                  onclick="sendOTP()"
                >
                  Send OTP
                </button>
              </div>
            </form>
            <div class="row pt-5">
              <div class="col-auto me-auto">
                <a
                  class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-0-hover colourunderline fontstype"
                  href="#"
                >
                  New Registration
                </a>
              </div>
              <div class="col-auto">
                <a
                  class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-0-hover colourunderline fontstype"
                  href="#"
                >
                  Back to home
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
