<footer class="" style="background: #313460">
    <div  class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3 mb-2-5 mb-lg-0">
                <a href="/" class="footer-logo">
                    <img src="{{asset('/public/assets/admin/img/logo.png')}}" height="50" width="50" class="mb-4" alt="Footer Logo">
                </a>
                <p class="mb-1-6 text-white">
                    It's an ideal opportunity to begin investing your energy such that illuminates you.
                </p>
                <form class="quform newsletter" action="quform/newsletter-two.php" method="post" enctype="multipart/form-data" onclick="">

                    <div class="quform-elements">

                        <div class="row">


                        </div>

                    </div>

                </form>
            </div>
            @php
                $user = Auth::user();
            @endphp
            <div class="col-md-6 col-lg-3 mb-2-5 mb-lg-0">
                <div class="ps-md-1-6 ps-lg-1-9">
                    <h5 class="" style="color: #ffff">Quick Links</h5>
                    <ul class="footer-list">
                        <li>
                            @auth
                                @if(Auth::user()->state == 'cg')
                                    <a href="{{ url('/cghome') }}">Home</a>
                                @elseif(Auth::user()->state == 'mp')
                                    <a href="{{ url('/mphome') }}">Home</a>
                                @else
                                    <a href="">Home</a>
                                @endif
                            @else
                                @if(Session::has('selected_state'))
                                    @if(Session::get('selected_state') == 'cg')
                                        <a href="{{ url('/cghome') }}">Home</a>
                                    @elseif(Session::get('selected_state') == 'mp')
                                        <a href="{{ url('/mphome') }}">Home</a>
                                    @else
                                        <a href="">Home</a>
                                    @endif
                                @endif
                            @endauth
                        </li>
                        <li><a href="{{url('/aboutus')}}">About Us</a></li>
                        <li>
                           
                            @auth
                                @if(Auth::user()->state == 'cg')
                                    <a href="{{ url('/cgpyq') }}">PYQ</a>
                                @elseif(Auth::user()->state == 'mp')
                                    <a href="{{ url('/pyq') }}">PYQ</a>
                                @else
                                    <a href="">PYQ</a>
                                @endif
                            @else
                                @if(Session::has('selected_state'))
                                    @if(Session::get('selected_state') == 'cg')
                                        <a href="{{ url('/cgpyq') }}">PYQ</a>
                                    @elseif(Session::get('selected_state') == 'mp')
                                        <a href="{{ url('/pyq') }}">PYQ</a>
                                    @else
                                        <a href="">PYQ</a>   
                                    @endif
                                @endif
                            @endauth
                        </li>
                        {{-- <li><a href="">Instructor</a></li> --}}
                    </ul>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3 mb-2-5 mb-md-0">
                <div class="ps-lg-1-9 ps-xl-2-5">
                    <h5 class=""style="color: #ffff">Quick Links</h5>
                    <ul class="footer-list">
                        <li>
                            @auth
                            @if(Auth::user()->state == 'cg')
                                <a href="{{ url('/cgplan') }}">Plans</a>
                            @elseif(Auth::user()->state == 'mp')
                                <a href="{{ url('/ourplan') }}">Plans</a>
                            @else
                                <a href="">Plans</a>
                            @endif
                        @else
                            @if(Session::has('selected_state'))
                                @if(Session::get('selected_state') == 'cg')
                                    <a href="{{ url('/cgplan') }}">Plans</a>
                                @elseif(Session::get('selected_state') == 'mp')
                                    <a href="{{ url('/ourplan') }}">Plans</a>
                                @else
                                    <a href="">Plans</a>
                                @endif
                            @endif
                        @endauth
                        </li> 
                        <li><a href="{{url('/MainsPractice')}}">Mains Practice Question</a></li>
                        <li><a href="{{url('/contact')}}">Contact</a></li>
                        
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="ps-md-1-9">
                    <h5 class="" style="color: #ffff">Social Media Links</h5>
                    <ul class="list-unstyled d-flex gap-3">
                        <li>
                            <a href="https://www.facebook.com" target="_blank">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.twitter.com"  target="_blank">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com"  target="_blank">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.linkedin.com" target="_blank">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com"  target="_blank">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            
        </div>
        <div class="footer-bar text-center">
            <p class="mb-0 text-white font-weight-500">&copy; <span class="current-year"></span>  Powered by Rays IT & Design World <a href="#!" class="text-secondary"></a></p>
        </div>
    </div>
</footer>

    </div>

    {{-- <div class="buy-theme alt-font d-none d-lg-inline-block">
        <a href="" target="_blank">
            <i class="fab fa-telegram"></i> 
            <span>Join Telegram</span>
        </a>
    </div> --}}

    <div class="buy-theme alt-font d-block">
        <a href="https://t.me/mppscmainsorbit" target="_blank">
            <img src="{{ asset('public/assets/front/img/logos/telegram.png') }}" alt="" height="50" width="50">
            <span>Join Telegram</span>
        </a>
    </div>
    {{-- <div class="buy-whatsapp alt-font d-block">
        <a href="https://wa.me/{{$settingsData->whatsapp}}" target="_blank">
            <img src="{{ asset('public/assets/front/img/logos/whatsapp.png') }}" alt="" height="50" width="50">
            <span>Join Telegram</span>
        </a>
    </div>
    <div class="buy-you alt-font d-block">
        <a href="https://youtube.com/@mainsorbit?si=QjqS52vouecH6d0Q" target="_blank">
            <img src="{{ asset('public//assets/front/img/logos/youtybe.png') }}" alt="" height="55" width="55">
            <span>Join Telegram</span>
        </a>
    </div> --}}

    

    <a href="#!" class="scroll-to-top"><i class="fas fa-angle-up" aria-hidden="true"></i></a>
    <!-- end scroll to top -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- jQuery -->
    <script src="{{asset('/public/assets/front/js/jquery.min.js')}}"></script>

    <!-- popper js -->
    <script src="{{asset('/public/assets/front/js/popper.min.js')}}"></script>

    <!-- bootstrap -->
    <script src="{{asset('/public/assets/front/js/bootstrap.min.js')}}"></script>

    <!-- core.min.js -->
    <script src="{{asset('/public/assets/front/js/core.min.js')}}"></script>

    <!-- search -->
    <script src="{{asset('/public/assets/front/search/search.js')}}"></script>

    <!-- custom scripts -->
    <script src="{{asset('/public/assets/front/js/main.js')}}"></script>

    <!-- form plugins js -->
    <script src="{{asset('/public/assets/front/quform/js/plugins.js')}}"></script>

    <!-- form scripts js -->
    <script src="{{asset('/public/assets/front/quform/js/scripts.js')}}"></script>

  
<!-- jQuery (if not already included) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Slick JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

<script>
    $(document).ready(function(){
        let teamMembers = $('.team-member').length;

        if (teamMembers === 1) {
            $('.team-container').addClass('single-member');
        }

        if (teamMembers > 1) {
            $('.team-container').slick({
                slidesToShow: Math.min(teamMembers, 4),
                slidesToScroll: 1,    
                arrows: true,         
                prevArrow: '<button class="slick-prev"></button>',
                nextArrow: '<button class="slick-next"></button>',
                autoplay: true,       
                autoplaySpeed: 3000,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: { slidesToShow: Math.min(teamMembers, 3) }
                    },
                    {
                        breakpoint: 768,
                        settings: { slidesToShow: Math.min(teamMembers, 2) }
                    },
                    {
                        breakpoint: 480,
                        settings: { slidesToShow: 1 }
                    }
                ]
            });
        } else {
            $('.team-container').css({
                "display": "flex",
                "justify-content": "center",
                "align-items": "center"
            });
        }
    });

    </script>
    
    <script>
        function checkLogin(planId) {
             let isLoggedIn = $("#auth_user").val(); 
     
             if (isLoggedIn == "1") {
                 $("#plan_id").val(planId);
                 $("#purchasePlanModal").modal("show");
             } else {
                 alert("Please log in to purchase a plan.");
                 $("#loginModal").modal("show");
             }
         }
     
         $("#purchasePlanForm").submit(function(e) {
             e.preventDefault();
             let formData = $(this).serialize(); 
     
             $.ajax({
                 url: "{{ route('purchase.plan') }}",
                 type: "POST",
                 data: formData,
                 success: function(response) {
                     alert(response.message);
                     $("#purchasePlanModal").modal("hide");
                     if (response.redirect_url) {
                         window.location.href = response.redirect_url;
                     }
                 },
                 error: function(xhr) {
                     alert(xhr.responseJSON.message);
                 }
             });
         });
    </script>

<script type="module">
    // ✅ Firebase SDK Import Karein
    import { initializeApp } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-app.js";
    import { getAuth, signInWithPopup, GoogleAuthProvider, signOut } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-auth.js";

    // ✅ Firebase Config
    const firebaseConfig = {
        apiKey: "AIzaSyCJ1CID-liGuE6yBk6NgJ8wl1OF9FCsMpk",
        authDomain: "orbitmains.firebaseapp.com",
        projectId: "orbitmains",
        storageBucket: "orbitmains.firebasestorage.app",
        messagingSenderId: "992288671744",
        appId: "1:992288671744:web:99f119e45c41bdfabab0e5",
        measurementId: "G-0225JCFNEK"
    };

    //Firebase Initialize Karein
    const app = initializeApp(firebaseConfig);
    const auth = getAuth();
    const provider = new GoogleAuthProvider();

        //  Google Login Function
        document.getElementById("loginBtn").addEventListener("click", () => {
            signInWithPopup(auth, provider)
                .then((result) => {
                    const user = result.user;
                    console.log("User Logged In:", user);

                    // ✅ Session se selected_state lein (agar localStorage ya sessionStorage me store kiya hai)
                    let selectedState = localStorage.getItem("selected_state"); 

                    fetch("https://phpstack-1394637-5280790.cloudwaysapps.com/save-user", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')?.getAttribute("content") || ""
                        },
                        body: JSON.stringify({
                            name: user.displayName,
                            email: user.email,
                            state: selectedState  // ✅ State bhi send karna hai
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log("User Saved:", data);
                        window.location.href = 'https://phpstack-1394637-5280790.cloudwaysapps.com/userCount';
                    })
                    .catch(error => console.error("Fetch Error:", error));
                })
                .catch((error) => {
                    console.error("Login Error:", error);
                });
        });



    // Logout Function
    document.getElementById("logoutBtn").addEventListener("click", () => {
        signOut(auth)
            .then(() => {
                document.getElementById("user").innerHTML = "You are logged out";
            })
            .catch((error) => {
                console.error("Logout Error:", error);
            });
    });
</script>
    
</body>

</html>