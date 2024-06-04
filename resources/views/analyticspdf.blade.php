<html lang="en">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title> Delta Hotels Analytics Report</title>

    <style>
        .headerLogo {
            height: 50px;
            margin: auto;
        }

        .headerText {
            font-size: 21px;
            font-weight: 500;
            margin-top: 40px;
            font-family: Arial, Helvetica, sans-serif;
        }


        .dateText {
            font-size: 18px;
            margin-bottom: 15px;
            font-family: Arial, Helvetica, sans-serif;
        }


        .pageNum {
            font-size: 10px;
            font-family: Arial, Helvetica, sans-serif;
            float: right;

        }

        .pageNum2 {
            font-size: 10px;
            font-family: Arial, Helvetica, sans-serif;
            float: right;
            padding-top: 130px;
        }

        header {
            position: fixed;
            top: -25px;
            left: 0px;
            right: 0px;
            height: 50px;

        }

        footer {
            position: fixed;
            bottom: -60px;
            left: 0px;
            right: 0px;
            height: 40px;

            /** Extra personal styles **/
            background-color: white;
            color: black;
            text-align: center;
            font-size: 10pt;

        }

        .item1 {
            width: 40%;
        }


        .mainTable {
            width: 100%;
            height: 320px;

        }

        .tableSingles {
            width: 100%;
        }

        .single {
            height: 280px;
            /* padding-top: 5px; */
        }


        .squares {
            height: 280px;
            width: 350px;

        }

        .page-break {
            page-break-after: always;
        }

        .page2 {
            margin-top: 50px;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>


<body>


    <header>
        <img class="headerLogo" src="{{ public_path('storage/logos/elmLogo_slogan.png') }}">
    </header>



    <footer>
        Tel: 519.913.3169 | TF: 1.844.EYELOOK | Fax: 519.937.1578 | support@eyelookmedia.com | www.eyelookmedia.com
    </footer>

    <main>
        <div>
            {{-- @if ($data) --}}
            {!! $data !!}
            {{-- @endif --}}
        </div>
    </main>





</body>

</html>
