<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Login - Library Hub</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logoririn.png') }}">

    <style>

        /* =========================================
           RESET
        ========================================= */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        /* =========================================
           BODY
        ========================================= */

        body {
            min-height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
            background:
                radial-gradient(
                    circle at 15% 20%,
                    rgba(244, 201, 93, 0.12),
                    transparent 28%
                ),
                radial-gradient(
                    circle at 85% 80%,
                    rgba(79, 70, 229, 0.12),
                    transparent 30%
                ),
                #eef1f6;

            display: flex;
            justify-content: center;
            align-items: center;

            padding: 25px;
        }


        /* =========================================
           LOGIN WRAPPER
        ========================================= */

        .login-wrapper {
            width: 100%;
            max-width: 1050px;
            min-height: 620px;

            background: white;

            border-radius: 22px;
            overflow: hidden;

            display: grid;
            grid-template-columns: 46% 54%;

            box-shadow:
                0 25px 60px rgba(15, 23, 42, 0.12),
                0 8px 20px rgba(15, 23, 42, 0.05);
        }


        /* =========================================
           LEFT PANEL
        ========================================= */

        .welcome-section {
            position: relative;

            background:
                linear-gradient(
                    145deg,
                    #172554 0%,
                    #1e1b4b 55%,
                    #312e81 100%
                );

            color: white;

            padding: 55px;

            display: flex;
            flex-direction: column;
            justify-content: space-between;

            overflow: hidden;
        }


        /* DECORATIVE CIRCLES */

        .circle-one {
            position: absolute;

            width: 260px;
            height: 260px;

            border-radius: 50%;

            background: rgba(244, 201, 93, 0.07);

            top: -110px;
            right: -90px;
        }

        .circle-two {
            position: absolute;

            width: 180px;
            height: 180px;

            border-radius: 50%;

            background: rgba(255, 255, 255, 0.05);

            bottom: -70px;
            left: -65px;
        }

        .circle-three {
            position: absolute;

            width: 90px;
            height: 90px;

            border-radius: 50%;

            border: 1px solid rgba(244, 201, 93, 0.14);

            right: 65px;
            bottom: 55px;
        }


        /* =========================================
           BRAND
        ========================================= */

        .brand {
            position: relative;
            z-index: 2;

            display: flex;
            align-items: center;

            gap: 12px;
        }


        .brand-logo {
            width: 46px;
            height: 46px;

            background:
                linear-gradient(
                    135deg,
                    #f4c95d,
                    #d5a82e
                );

            border-radius: 12px;

            display: flex;
            justify-content: center;
            align-items: center;

            color: #172554;

            font-size: 21px;

            box-shadow:
                0 8px 20px rgba(0, 0, 0, 0.12);
        }


        .brand-text h2 {
            font-size: 17px;
            margin-bottom: 3px;
        }


        .brand-text span {
            font-size: 9px;
            color: rgba(255,255,255,0.55);
            letter-spacing: 1.4px;
            text-transform: uppercase;
        }


        /* =========================================
           WELCOME CONTENT
        ========================================= */

        .welcome-content {
            position: relative;
            z-index: 2;
        }


        .welcome-label {
            display: inline-block;

            color: #f4c95d;

            font-size: 10px;
            font-weight: bold;

            letter-spacing: 1.5px;

            margin-bottom: 13px;
        }


        .welcome-content h1 {
            font-size: 40px;
            line-height: 1.2;

            margin-bottom: 17px;

            color: white;
        }


        .welcome-content p {
            max-width: 390px;

            color: rgba(255,255,255,0.72);

            font-size: 13px;
            line-height: 1.8;

            margin-bottom: 28px;
        }


        /* =========================================
           FEATURES
        ========================================= */

        .feature-list {
            display: flex;
            flex-direction: column;

            gap: 12px;
        }


        .feature-item {
            display: flex;
            align-items: center;

            gap: 10px;

            color: rgba(255,255,255,0.82);

            font-size: 12px;
        }


        .feature-check {
            width: 25px;
            height: 25px;

            flex-shrink: 0;

            border-radius: 50%;

            background: rgba(244, 201, 93, 0.12);

            border: 1px solid rgba(244, 201, 93, 0.18);

            color: #f4c95d;

            display: flex;
            justify-content: center;
            align-items: center;

            font-size: 11px;
        }


        /* =========================================
           LEFT FOOTER
        ========================================= */

        .welcome-footer {
            position: relative;
            z-index: 2;

            color: rgba(255,255,255,0.38);

            font-size: 10px;
        }


        /* =========================================
           RIGHT PANEL
        ========================================= */

        .form-section {
            padding: 55px;

            display: flex;
            justify-content: center;
            align-items: center;

            background: #ffffff;
        }


        .login-card {
            width: 100%;
            max-width: 390px;
        }


        /* =========================================
           LOGIN HEADING
        ========================================= */

        .login-label {
            display: inline-block;

            color: #b68b2c;

            font-size: 10px;
            font-weight: bold;

            letter-spacing: 1.4px;

            margin-bottom: 8px;
        }


        .login-title {
            color: #172554;

            font-size: 31px;

            margin-bottom: 8px;
        }


        .login-subtitle {
            color: #6b7280;

            font-size: 13px;
            line-height: 1.7;

            margin-bottom: 30px;
        }


        /* =========================================
           FORM
        ========================================= */

        .form-group {
            margin-bottom: 19px;
        }


        .form-group label {
            display: block;

            color: #374151;

            font-size: 12px;
            font-weight: bold;

            margin-bottom: 8px;
        }


        .input-wrapper {
            position: relative;
        }


        .input-icon {
            position: absolute;

            left: 14px;
            top: 50%;

            transform: translateY(-50%);

            width: 18px;

            color: #9ca3af;

            font-size: 15px;

            pointer-events: none;
        }


        .form-control {
            width: 100%;
            height: 48px;

            padding:
                0
                14px
                0
                43px;

            border: 1px solid #dfe3ea;

            border-radius: 9px;

            background: #f9fafb;

            color: #1f2937;

            font-family: inherit;
            font-size: 13px;

            outline: none;

            transition: 0.2s ease;
        }


        .form-control:hover {
            border-color: #cfd5df;
        }


        .form-control:focus {
            background: white;

            border-color: #4f46e5;

            box-shadow:
                0 0 0 4px rgba(79, 70, 229, 0.08);
        }


        .form-control::placeholder {
            color: #a3aab5;
        }


        /* =========================================
           ERROR
        ========================================= */

        .error-message {
            margin-top: 7px;

            color: #dc2626;

            font-size: 11px;
        }


        /* =========================================
           LOGIN BUTTON
        ========================================= */

        .login-button {
            width: 100%;
            height: 49px;

            margin-top: 5px;

            border: none;

            border-radius: 9px;

            background:
                linear-gradient(
                    135deg,
                    #172554,
                    #312e81
                );

            color: white;

            font-family: inherit;

            font-size: 13px;
            font-weight: bold;

            cursor: pointer;

            transition: 0.2s ease;

            box-shadow:
                0 8px 18px rgba(23, 37, 84, 0.14);
        }


        .login-button:hover {
            transform: translateY(-1px);

            background:
                linear-gradient(
                    135deg,
                    #1e3a8a,
                    #3730a3
                );

            box-shadow:
                0 11px 22px rgba(23, 37, 84, 0.18);
        }


        .login-button:active {
            transform: translateY(0);
        }


        /* =========================================
           DEMO ACCOUNT
        ========================================= */

        .demo-account {
            margin-top: 22px;

            padding: 14px 15px;

            border-radius: 9px;

            background: #fffaf0;

            border: 1px solid #f3e4bc;
        }


        .demo-title {
            display: flex;
            align-items: center;

            gap: 6px;

            color: #9a731d;

            font-size: 9px;
            font-weight: bold;

            letter-spacing: 1px;

            margin-bottom: 7px;
        }


        .demo-title::before {
            content: "●";

            font-size: 7px;

            color: #d4a72c;
        }


        .demo-text {
            color: #7c6a40;

            font-size: 10px;

            line-height: 1.7;
        }


        .demo-text strong {
            color: #5f4a1f;
        }


        /* =========================================
           FORM FOOTER
        ========================================= */

        .form-footer {
            text-align: center;

            color: #a1a7b0;

            font-size: 9px;

            margin-top: 22px;
        }


        /* =========================================
           RESPONSIVE
        ========================================= */

        @media (max-width: 850px) {

            .login-wrapper {
                max-width: 520px;

                grid-template-columns: 1fr;
            }


            .welcome-section {
                min-height: 330px;

                padding: 40px;
            }


            .welcome-content h1 {
                font-size: 31px;
            }


            .welcome-content p {
                margin-bottom: 20px;
            }


            .welcome-footer {
                display: none;
            }


            .form-section {
                padding: 40px;
            }

        }


        @media (max-width: 500px) {

            body {
                padding: 12px;
            }


            .login-wrapper {
                border-radius: 16px;
            }


            .welcome-section,
            .form-section {
                padding: 28px 23px;
            }


            .welcome-section {
                min-height: 285px;
            }


            .brand-logo {
                width: 42px;
                height: 42px;
            }


            .welcome-content h1 {
                font-size: 27px;
            }


            .welcome-content p {
                font-size: 12px;
            }


            .feature-item {
                font-size: 11px;
            }


            .login-title {
                font-size: 27px;
            }

        }

    </style>

</head>


<body>


    <div class="login-wrapper">


        <!-- =====================================
             LEFT SIDE
        ====================================== -->

        <section class="welcome-section">

            <!-- Decorative Shapes -->
            <div class="circle-one"></div>
            <div class="circle-two"></div>
            <div class="circle-three"></div>


            <!-- BRAND -->

            <div class="brand">

                <div class="brand-logo">
                    📚
                </div>

                <div class="brand-text">

                    <h2>
                        Library Hub
                    </h2>

                    <span>
                        Management System
                    </span>

                </div>

            </div>


            <!-- WELCOME -->

            <div class="welcome-content">

                <span class="welcome-label">
                    SISTEM MANAJEMEN PERPUSTAKAAN
                </span>

                <h1>
                    Kelola Buku.
                    <br>
                    Lebih Mudah.
                </h1>

                <p>
                    Selamat datang di Library Hub, sistem sederhana
                    untuk mengelola koleksi buku perpustakaan secara
                    teratur dan efisien.
                </p>


                <!-- FEATURES -->

                <div class="feature-list">

                    <div class="feature-item">

                        <div class="feature-check">
                            ✓
                        </div>

                        <span>
                            Kelola koleksi buku dengan mudah
                        </span>

                    </div>


                    <div class="feature-item">

                        <div class="feature-check">
                            ✓
                        </div>

                        <span>
                            Kelola kategori buku
                        </span>

                    </div>


                    <div class="feature-item">

                        <div class="feature-check">
                            ✓
                        </div>

                        <span>
                            Data tersimpan secara terorganisir
                        </span>

                    </div>

                </div>

            </div>


            <!-- FOOTER -->

            <div class="welcome-footer">
                Library Hub © 2026
            </div>

        </section>



        <!-- =====================================
             RIGHT SIDE
        ====================================== -->

        <section class="form-section">

            <div class="login-card">


                <!-- HEADING -->

                <span class="login-label">
                    AKSES SISTEM
                </span>

                <h1 class="login-title">
                    Selamat Datang
                </h1>

                <p class="login-subtitle">
                    Masuk menggunakan akun kamu untuk mengakses
                    sistem manajemen perpustakaan.
                </p>


                <!-- FORM -->

                <form
                    action="{{ url('/login') }}"
                    method="POST"
                >

                    @csrf


                    <!-- EMAIL -->

                    <div class="form-group">

                        <label for="email">
                            Email
                        </label>

                        <div class="input-wrapper">

                            <span class="input-icon">
                                ✉
                            </span>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="form-control"
                                value="{{ old('email') }}"
                                placeholder="Masukkan alamat email"
                                required
                                autofocus
                            >

                        </div>


                        @error('email')

                            <div class="error-message">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>



                    <!-- PASSWORD -->

                    <div class="form-group">

                        <label for="password">
                            Password
                        </label>

                        <div class="input-wrapper">

                            <span class="input-icon">
                                🔒
                            </span>

                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="form-control"
                                placeholder="Masukkan password"
                                required
                            >

                        </div>


                        @error('password')

                            <div class="error-message">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>



                    <!-- BUTTON -->

                    <button
                        type="submit"
                        class="login-button"
                    >
                        Masuk ke Library Hub
                    </button>

                </form>



                <!-- DEMO ACCOUNT -->

                <div class="demo-account">

                    <div class="demo-title">
                        AKUN DEMO
                    </div>

                    <div class="demo-text">

                        Email:
                        <strong>
                            ririndwiaryanti@gmail.com
                        </strong>

                        <br>

                        Password:
                        <strong>
                            adminperpus
                        </strong>

                    </div>

                </div>


                <!-- FOOTER -->

                <div class="form-footer">
                    Sistem Manajemen Perpustakaan • 2026
                </div>


            </div>

        </section>

    </div>


</body>

</html>