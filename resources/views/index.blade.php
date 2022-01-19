<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- jQuery JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="/assets/favicon.ico" type="image/x-icon">

    <title>JUPEM - MOD PENYELENGGARAAN</title>

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        video {
            width: 100%;
            height: auto;
        }

        .bg-image {
            background: url(https://i.imgur.com/02Gsbb7.jpeg);

        }

        .bg-image {
            background-clip: initial;
            background-color: rgba(0, 0, 0, 0);
            background-origin: initial;
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
            z-index: 0;
        }

        .bg-opacity-black-60 {
            z-index: 9
        }

        .bg-opacity-black-60:before {
            content: "";
            height: 100%;
            left: 0;
            position: absolute;
            top: 0;
            width: 100%;
            z-index: -1
        }

        .bg-opacity-black-60:before {
            background: rgba(0, 0, 0, .6)
        }
    </style>

</head>

<body>

    <main>
        <div class="container py-4">
            <header class="pb-3 mb-4 border-bottom">
                <div class="col-md-12 mx-auto text-center">
                    <img src="https://i.imgur.com/m3IDSO6.png" alt="" srcset="" style="height:auto; width: 100px;"
                        class="mx-2">
                    <span class="fs-1 fw-bold text-danger text-center text-uppercase">Makluman Penyelenggaraan
                        Sistem</span>
                    <img src="https://i.imgur.com/SejXrSF.png" alt="" srcset="" style="height:auto; width: 100px;"
                        class="mx-2">
                </div>
            </header>

            <div class="row align-items-md-stretch my-4">
                <div class="col-md-12">
                    <div class="h-100 p-5 bg-warning border rounded-3">
                        <h5 class="fw-bold text-decoration-underline text-center text-uppercase">
                            {{-- Change this according to the title in CMS --}}
                            {{ $notice->tajukPenyelenggaraan }}
                        </h5>
                        @if ($notice->kataAluan != NULL)
                        {!! $notice->kataAluan !!}
                        @else
                        <p style="text-align: justify;">
                            Salam sejahtera, <br>
                            Pengguna yang dihormati,<br>
                            Capaian kepada sistem/aplikasi berikut sedang diselenggara seperti berikut : -
                        </p>
                        @endif
                        <hr>
                        <table class="table table-borderless p-0" style="width:60%">
                            <thead class="">
                                <tr>
                                    <th class="align-middle text-left" colspan="3">
                                        Sistem & Tempoh Penyelenggaraan
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="align-middle text-left" style="width:20%">Sistem Terlibat</td>
                                    <td style="width: 3%; text-align:center" class="align-middle">:</td>
                                    <td class="align-middle text-left">
                                        <span class="fs-6 fw-bold">
                                            {{ $notice->services->serviceName }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle text-left" style="width:20%">Mula</td>
                                    <td style="width: 10%; text-align:center" class="align-middle">:</td>
                                    <td class="align-middle text-left">
                                        <span class="fs-6 fw-bold">
                                            {{ $notice->mulaPenyelenggaraan }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle text-left" style="width:20%">Tamat</td>
                                    <td style="width: 10%; text-align:center" class="align-middle">:</td>
                                    <td class="align-middle text-left">
                                        <span class="fs-6 fw-bold">
                                            {{ $notice->tamatPenyelenggaraan }}
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <hr>
                        {{-- Create function for default text selected --}}
                        @if ($notice->kataAkhiran != NULL)
                        {!! $notice->kataAkhiran !!}
                        @else
                        <p>
                            Sepanjang tempoh penyelenggaraan ini, sebarang akses dan transaksi kepada sistem/aplikasi
                            akan
                            tergendala buat sementara waktu. <br>
                            Sebarang kesulitan amatlah dikesali. <br>
                            Sekian, harap maklum.
                        </p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="p-5 mb-4 bg-light rounded-3 border bg-image bg-opacity-black-60">
                <div class="container-fluid py-3">
                    <!-- <h4 class="display-7 fw-bold text-center">Video Korporat Mengenai eBiz JUPEM</h4> -->
                    <div class="col-md-12 mx-auto">
                        <video width="540" controls class="mx-auto">
                            <source src="assets/video/video_koporate_jupem.mp4" type="video/mp4">
                            <source src="assets/video/video_koporate_jupem.webm" type="video/webm">
                            Your browser does not support HTML5 video.
                        </video>
                    </div>
                </div>
            </div>

            <footer class="pt-3 mt-4 text-muted border-top text-center">
                <span class="align-middle ms-2">
                    Hakcipta Terpelihara &copy; {{ date('Y') }} Jabatan Ukur dan Pemetaan Malaysia (JUPEM)
                </span>
            </footer>
        </div>
    </main>
</body>

</html>