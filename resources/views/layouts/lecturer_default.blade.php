<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <title>{{ $lecturerData->Status . " " . $lecturerData->Lecturer_Lastname }}</title>
</head>
<body>
    <nav class="main-nav">
        <ul>
            <li @if ($page == 'home') class="active" @endif><a href="{{ Route('lecturer') }}"> 
                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g filter="url(#filter0_i_390_868)">
                    <path d="M29.4287 16.2884C29.0479 16.6689 28.5889 16.8591 28.0518 16.8591C27.5146 16.8591 27.0605 16.6738 26.6895 16.3031L26.25 15.8641V28.1269C26.25 28.6342 26.0693 29.0732 25.708 29.4439C25.3467 29.8146 24.9023 30 24.375 30H18.75V21.5711C18.75 21.3175 18.6572 21.098 18.4717 20.9126C18.2861 20.7273 18.0664 20.6346 17.8125 20.6346H12.1875C11.9336 20.6346 11.7139 20.7273 11.5283 20.9126C11.3428 21.098 11.25 21.3175 11.25 21.5711V30H5.625C5.09766 30 4.65332 29.8146 4.29199 29.4439C3.93066 29.0732 3.75 28.6342 3.75 28.1269V15.8641L3.31055 16.3031C2.93945 16.6738 2.48535 16.8591 1.94824 16.8591C1.41113 16.8591 0.952148 16.6689 0.571289 16.2884C0.19043 15.908 0 15.4495 0 14.9129C0 14.3763 0.185547 13.9227 0.556641 13.552L13.5645 0.557465C13.9551 0.16724 14.4336 -0.0181176 15 0.00139366C15.5664 -0.0181176 16.0449 0.16724 16.4355 0.557465L29.4434 13.552C29.8145 13.9227 30 14.3763 30 14.9129C30 15.4495 29.8096 15.908 29.4287 16.2884Z" fill="white"/>
                    </g>
                    <defs>
                    <filter id="filter0_i_390_868" x="0" y="0" width="30" height="30" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                    <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                    <feOffset/>
                    <feGaussianBlur stdDeviation="1.5"/>
                    <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1"/>
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0.156863 0 0 0 0 0.392157 0 0 0 0.65 0"/>
                    <feBlend mode="normal" in2="shape" result="effect1_innerShadow_390_868"/>
                    </filter>
                    </defs>
                </svg>
            </a></li>
            <li @if ($page == 'start_class') class="active" @endif><a href="{{ Route('lecturer_start_class') }}"> 
                <svg width="28" height="20" viewBox="0 0 28 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g filter="url(#filter0_i_390_861)">
                    <path d="M21.0002 10.7568C21.0002 10.9836 21.0924 11.2012 21.2565 11.3615C21.4206 11.5219 21.6431 11.612 21.8752 11.612L26.6879 11.6116C26.8505 11.6116 27.0098 11.5673 27.148 11.4837C27.2863 11.4002 27.398 11.2806 27.4706 11.1385C27.5432 10.9963 27.5739 10.8372 27.5592 10.679C27.5445 10.5208 27.485 10.3697 27.3874 10.2427C26.6119 9.22709 25.5775 8.42794 24.3875 7.9249C24.8989 7.46803 25.2918 6.89898 25.5341 6.2646C25.7764 5.63023 25.8611 4.94868 25.7812 4.27606C25.7013 3.60344 25.459 2.959 25.0745 2.39578C24.6899 1.83257 24.1739 1.3667 23.5691 1.03652C22.9643 0.706346 22.2879 0.52131 21.5956 0.49665C20.9033 0.471989 20.2149 0.608409 19.587 0.894678C18.9592 1.18095 18.41 1.60888 17.9845 2.14323C17.559 2.67759 17.2694 3.30309 17.1396 3.96824C17.106 4.14101 17.1278 4.31969 17.2018 4.47994C17.2759 4.6402 17.3987 4.77424 17.5536 4.86381C18.9702 5.68291 20.0484 6.96134 20.6008 8.47687C20.8661 9.20899 21.0012 9.9801 21.0002 10.7568V10.7568ZM0.6127 10.2426C1.38818 9.22692 2.4225 8.42774 3.61253 7.92469C3.10122 7.46781 2.70825 6.89877 2.46596 6.2644C2.22367 5.63003 2.139 4.94849 2.21891 4.27588C2.29883 3.60327 2.54104 2.95883 2.92562 2.39562C3.31019 1.83241 3.82613 1.36653 4.43095 1.03635C5.03577 0.706175 5.71217 0.521132 6.40447 0.496461C7.09676 0.47179 7.78516 0.608196 8.41297 0.894448C9.04078 1.1807 9.59005 1.60861 10.0156 2.14295C10.4411 2.6773 10.7307 3.30278 10.8605 3.96792C10.8941 4.14068 10.8723 4.31935 10.7983 4.4796C10.7242 4.63986 10.6014 4.7739 10.4466 4.86349C9.02998 5.68267 7.95179 6.96112 7.39942 8.47665C7.13412 9.20877 6.99902 9.97988 6.99998 10.7566C6.99998 10.8689 6.97734 10.9801 6.93336 11.0839C6.88939 11.1877 6.82492 11.282 6.74366 11.3614C6.6624 11.4408 6.56593 11.5038 6.45975 11.5468C6.35358 11.5897 6.23979 11.6118 6.12487 11.6118L1.31226 11.6114C1.14971 11.6114 0.990369 11.5671 0.852111 11.4836C0.713853 11.4 0.602142 11.2805 0.529505 11.1383C0.456868 10.9962 0.426177 10.8371 0.440871 10.6788C0.455566 10.5206 0.515066 10.3695 0.6127 10.2424V10.2426ZM10.8104 14.8287C9.93854 14.1769 9.29764 13.2743 8.9778 12.248C8.65796 11.2217 8.67527 10.1232 9.0273 9.10698C9.37933 8.09077 10.0484 7.20797 10.9403 6.5827C11.8323 5.95744 12.9023 5.62116 14 5.62116C15.0976 5.62116 16.1677 5.95744 17.0596 6.5827C17.9516 7.20797 18.6206 8.09077 18.9727 9.10698C19.3247 10.1232 19.342 11.2217 19.0222 12.248C18.7023 13.2743 18.0614 14.1769 17.1896 14.8287C18.8931 15.5638 20.2732 16.8677 21.0828 18.5068C21.1478 18.6371 21.1779 18.7816 21.1701 18.9264C21.1623 19.0713 21.1169 19.2119 21.0383 19.3349C20.9596 19.4579 20.8502 19.5593 20.7204 19.6297C20.5906 19.7 20.4446 19.7369 20.2962 19.7368H7.70381C7.5554 19.7368 7.40943 19.7 7.27963 19.6297C7.14982 19.5593 7.04044 19.4579 6.96178 19.3349C6.88311 19.2119 6.83774 19.0714 6.82994 18.9265C6.82214 18.7817 6.85216 18.6373 6.91718 18.5069C7.72677 16.8678 9.10689 15.5639 10.8104 14.8288V14.8287Z" fill="white"/>
                    </g>
                    <defs>
                    <filter id="filter0_i_390_861" x="0" y="0" width="28" height="20" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                    <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                    <feOffset/>
                    <feGaussianBlur stdDeviation="1.5"/>
                    <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1"/>
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0.156863 0 0 0 0 0.392157 0 0 0 0.65 0"/>
                    <feBlend mode="normal" in2="shape" result="effect1_innerShadow_390_861"/>
                    </filter>
                    </defs>
                </svg>
            </a></li>
            <li @if ($page == 'courses') class="active" @endif><a href="{{ Route('lecturer_courses') }}"> 
                <svg width="34" height="30" viewBox="0 0 33 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g filter="url(#filter0_di_552_896)">
                    <path d="M27.4048 1.8584H5.5V6.06892H27.4048V1.8584ZM9.88095 5.01629H7.69048V2.91103H9.88095V5.01629Z" fill="white"/>
                    <path d="M25.8714 13.2268C25.6625 12.9704 25.3969 12.7619 25.0938 12.6163C24.7908 12.4706 24.4578 12.3915 24.119 12.3847H16.4502C16.1603 12.3847 15.8823 12.4954 15.6773 12.6924C15.4723 12.8894 15.3571 13.1566 15.3571 13.4352V19.7552C15.3571 20.0339 15.4723 20.3011 15.6773 20.4981C15.8823 20.6951 16.1603 20.8058 16.4502 20.8058H24.119C24.4619 20.8227 24.8035 20.754 25.1106 20.6065C25.4177 20.4589 25.6798 20.2375 25.8714 19.9637L28.5 16.5952L25.8714 13.2268Z" fill="white"/>
                    <path d="M16.4502 10.2795H24.119C24.7427 10.2891 25.3573 10.4243 25.9232 10.6764C26.4892 10.9284 26.9939 11.2916 27.4048 11.7426V8.17419H5.5V12.3847H13.3682C13.5928 11.7709 14.0097 11.2389 14.5615 10.862C15.1134 10.485 15.7732 10.2815 16.4502 10.2795ZM7.69048 11.3321V9.22682H9.88095V11.3321H7.69048Z" fill="white"/>
                    <path d="M13.1667 14.49H5.5V18.7005H13.1667V14.49ZM7.69048 17.6479V15.5426H9.88095V17.6479H7.69048Z" fill="white"/>
                    </g>
                    <defs>
                    <filter id="filter0_di_552_896" x="0.5" y="0.858398" width="33" height="28.9499" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                    <feOffset dy="4"/>
                    <feGaussianBlur stdDeviation="2.5"/>
                    <feComposite in2="hardAlpha" operator="out"/>
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_552_896"/>
                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_552_896" result="shape"/>
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                    <feOffset/>
                    <feGaussianBlur stdDeviation="1.5"/>
                    <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1"/>
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0.156863 0 0 0 0 0.392157 0 0 0 0.65 0"/>
                    <feBlend mode="normal" in2="shape" result="effect2_innerShadow_552_896"/>
                    </filter>
                    </defs>
                </svg>
            </a></li>
            <li @if ($page == 'notifications') class="active" @endif><a href="{{ Route('lecturer_notifications') }}"> 
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g filter="url(#filter0_i_390_873)">
                    <path d="M19.4916 13.7921C19.4061 13.7032 19.322 13.6143 19.2395 13.5285C18.1051 12.3457 17.4188 11.6318 17.4188 8.28333C17.4188 6.54976 16.9378 5.12735 15.9895 4.06054C15.2903 3.27243 14.3452 2.67457 13.0994 2.23273C13.0834 2.22505 13.0691 2.21496 13.0572 2.20295C12.6091 0.909445 11.3829 0.0431061 10 0.0431061C8.61712 0.0431061 7.39148 0.909445 6.9434 2.20162C6.93144 2.21319 6.91732 2.22295 6.90163 2.23051C3.99454 3.26221 2.58173 5.24158 2.58173 8.28199C2.58173 11.6318 1.89646 12.3457 0.761055 13.5271C0.678555 13.6129 0.594508 13.7001 0.508914 13.7907C0.287815 14.0206 0.14773 14.3003 0.105239 14.5966C0.0627472 14.893 0.119628 15.1936 0.269149 15.463C0.587289 16.0408 1.26534 16.3995 2.03929 16.3995H17.9664C18.7368 16.3995 19.4102 16.0413 19.7294 15.4661C19.8795 15.1966 19.9369 14.8958 19.8948 14.5991C19.8527 14.3024 19.7128 14.0223 19.4916 13.7921V13.7921Z" fill="white"/>
                    <path d="M9.99995 19.9569C10.745 19.9564 11.4761 19.782 12.1155 19.4523C12.755 19.1226 13.279 18.6499 13.632 18.0842C13.6486 18.0571 13.6569 18.0267 13.6559 17.9961C13.6549 17.9654 13.6447 17.9355 13.6263 17.9092C13.6079 17.883 13.582 17.8613 13.551 17.8462C13.52 17.8311 13.4851 17.8232 13.4495 17.8233H6.55145C6.51583 17.8232 6.48079 17.831 6.44974 17.846C6.41868 17.8611 6.39267 17.8828 6.37424 17.9091C6.35581 17.9353 6.34558 17.9653 6.34456 17.996C6.34354 18.0267 6.35175 18.057 6.3684 18.0842C6.72137 18.6498 7.2453 19.1225 7.88465 19.4522C8.52401 19.7819 9.25494 19.9563 9.99995 19.9569Z" fill="white"/>
                    </g>
                    <defs>
                    <filter id="filter0_i_390_873" x="0" y="0" width="20" height="20" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                    <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                    <feOffset/>
                    <feGaussianBlur stdDeviation="1.5"/>
                    <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1"/>
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0.156863 0 0 0 0 0.392157 0 0 0 0.65 0"/>
                    <feBlend mode="normal" in2="shape" result="effect1_innerShadow_390_873"/>
                    </filter>
                    </defs>
                </svg>
            </a></li>
        </ul>
    </nav>

    <main>
        <div class="profile-info">
            <div>
                <h3>{{ $lecturerData->Status . " " . $lecturerData->Lecturer_Lastname }}</h3>
                <p>{{ $lecturerData->Lecturer_ID }}</p>
            </div>
            <div class="img" style="background-image: url('{{ asset($lecturerData->Profile) }}')">
                <a href="{{ Route('lecturer_logout') }}"></a>
            </div>
        </div>

        @yield('page-content')
    </main>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>