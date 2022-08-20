<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  </head>
  <body>
      
    <div class="contianer mt-4">
        <div class="row justify-content-center">
            <div class="col-md-4 ">
                <form method="POST" action="{{ route('register') }}">
                  @csrf

                  @if(Session::get('success'))
                    <div class="alert alert-success">
                      {{ Session::get('success') }}
                    </div>
                  @endif

                  @if(Session::get('error'))
                    <div class="alert alert-success">
                      {{ Session::get('error') }}
                    </div>
                  @endif


                    <!-- Name input -->
                    <div class="form-outline mb-4">
                      <input type="text" name="name" id="registerName" class="form-control" autofocus value="{{old('name')}}" />
                      <label class="form-label" for="registerName">Name</label>
                      @error('name')
                          <span >
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
              
                    <!-- Username input -->
                    <div class="form-outline mb-4">
                      <input id="favoritecolor" class="form-control" type="text" name="favoritecolor"  value="{{old('favoritecolor')}}" />
                      <label class="form-label" for="favoritecolor">Favoritecolor</label>
                      @error('favoritecolor')
                          <span >
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
              
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                      <input type="email" name="email" id="registerEmail" class="form-control"  value="{{old('email')}}" />
                      <label class="form-label" for="registerEmail">Email</label>

                      @error('email')
                          <span>
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
              
                    <!-- Password input -->
                    <div class="form-outline mb-4">
                      <input type="password" id="registerPassword" class="form-control" name="password" value="{{old('password')}}" />
                      <label class="form-label" for="registerPassword">Password</label>
                      @error('password')
                          <span>
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
              
                    <!-- Repeat Password input -->
                    <div class="form-outline mb-4">
                      <input type="password" id="registerRepeatPassword" class="form-control" name="password_confirmation"  value="{{old('password_confirmation')}}" />
                      <label class="form-label" for="registerRepeatPassword">Repeat password</label>
                      @error('password_confirmation')
                          <span>
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
              
                  
              
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary mb-3" style="width: 100%;">Register In</button>
                  </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  </body>
</html>