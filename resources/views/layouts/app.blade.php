<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Wallet</title>
    <script src="{{ asset('user-dashboard/js/jquery.js') }}"></script>
    <script src="{{ asset('user-dashboard/bootstrap/dist/js/bootstrap.bundle.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('user-dashboard/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user-dashboard/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('user-dashboard/css/styles.css') }}">
</head>

<body>


    <div class="sidebar-panel">


        <div class="row">

            <div class="col-sm-6">
                <button class="closeing">
                    <i class="closeFontIcon fa fa-times menu-icon fa-2x" aria-hidden="true"></i>
                </button>
            </div>
        </div>
        <div class="d-flex justify-content-center navbar-brand pl-2">SMART WALLET</div>

     @auth
     <div class="col-sm-12">
        <div class="sidelistwrp">
            <ul>
                <li class="pl-2 noLgScr">Dashboard</li>
                <li class="pl-2" data-toggle="modal" data-target="#modelId">My Wallet Balance</li>
                <a href="tel://08121225275">
                    <li class="pl-2">Live Call</li>
                </a>
                <a href="{{ route('logout') }}">
                    <li class="pl-2">Logout</li>
                </a>
            </ul>
        </div>
    </div>
     @endauth
    </div>




    <nav class="navbar navbar-expand navbar-light bg-transparent">
        <button class="opennav">
            <i class="text-dark myFontBars fa fa-bars menu-icon fa-2x" aria-hidden="true"></i>
        </button>
        @guest
        <div class="navbar-brand pl-2 ml-5 text-warning">Register On Smart Wallet</div>

        @endguest
      @auth
      <div class="navbar-brand pl-2 ml-5"><a href="/home" class=" text-warning ">Home</a></div>
      <ul class="nav navbar-nav">
          <li class="nav-item active">
          </li>

          <li class="nav-item">
              <a class="nav-link d-none d-lg-block text-warning" data-toggle="modal" data-target="#modelId2">Fund Wallet</a>
          </li>

        
      </ul>

      @endauth


        <div class="ml-auto">



           @auth
           <a href="{{ route('logout') }} " class="mr-5 text-warning"> Logout</a>
           @endauth
        </div>
    </nav>

    <div class="main-wrapper">
        <div class="black-overlay"></div>
        <div class="container-fluid">
            @include('layouts.messages')
      @yield('content')
        </div>

    </div>
 @auth
     
    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                            <h5 class="modal-title">Wallet Balance</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                <div class="modal-body">
                    <div class="container-fluid">
                    <p><b> Dear {{ Auth::user()->name,  }},</b> Your Smart E-Wallet balance is &#8358;{{ number_format(Auth::user()->amount) }}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    
    <script>
        $('#exampleModal').on('show.bs.modal', event => {
            var button = $(event.relatedTarget);
            var modal = $(this);
            // Use above variables to manipulate the DOM
            
        });
    </script>
    <!-- Button trigger modal -->
   
    <!-- Modal -->
    <div class="modal fade" id="modelId2" tabindex="-1" role="dialog" aria-labelledby="modelTitleId2" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                            <h5 class="modal-title">Fund Wallet</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form method="POST" action="{{ route('initializeFunding') }}">
                            @csrf
                            <div class="form-group">
                                <label for="amount">{{ __('Amount') }}</label>
                                <input id="amount" type="number" class="form-control @error('amount') is-invalid @enderror"
                                    name="amount" value="{{ old('amount') }}" required autocomplete="amount" autofocus min="100">

                                @error('amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="remarks">Remarks</label>
                                <textarea class="form-control" name="remarks" id="remarks"
                                    rows="6">{{ old('remarks') }}</textarea>
                            </div>
                           


                      
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" >Fund Wallet</button>  </form>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        $('#exampleModal').on('show.bs.modal', event => {
            var button = $(event.relatedTarget);
            var modal = $(this);
            // Use above variables to manipulate the DOM
            
        });

    </script>
    <!-- Button trigger modal -->
 @endauth
    
    @if (Request::get('page'))
       <script>
           document.getElementById('transactions').style.display = 'block'
       </script>
    @endif
  
</body>

</html>


<script>
    function showTransactions(){
        let x =  document.getElementById('transactions');
        if (x.style.display =='none') {
            x.style.display = 'block';
        }
        else{
            x.style.display ='none'
        }
    }

    $(document).ready(function() {
        $('.opennav').click(function() {
            $('.sidebar-panel').addClass('activate');
            $('.sidebar-panel').removeClass('unactivate');
            $('.black-overlay').addClass('dark');
        });


        $('.closeing').click(function() {
            $('.sidebar-panel').addClass('unactivate');
            $('.sidebar-panel').removeClass('activate');
            $('.black-overlay').removeClass('dark');
        });

        $('.black-overlay').click(function() {
            $('.black-overlay').removeClass('dark');
            $('.sidebar-panel').addClass('unactivate');
        });
    });

 
</script>
