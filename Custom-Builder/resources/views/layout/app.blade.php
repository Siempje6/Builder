<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beheer</title>

    <style>
        body {
            background: #F3F4F6;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            padding: 20px;
        }

        table {
            margin-top: 20px;
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 6px 12px;
        }

        th {
            background: #f2f2f2;
        }

        h2 a {
            text-decoration: none;
            color: #2563EB;
        }

        h2 a:hover {
            text-decoration: none;
            color: #1D4ED8;
        }

        h3 a {
            text-decoration: none;
            color: #2563EB;
        }

        h3 a:hover {
            text-decoration: none;
            color: #1D4ED8;
        }
    </style>
</head>

<body>

    <div class="header">
        <style>
            .header {
                background: #FFFFFF;
                position: absolute;
                top: 0px;
                left: 0px;
                width: 100%;
            }

            .header .nav-users {
                padding: 0px 3rem;
            }

            #user {
                padding: 4px 10px;
                background: #2563EB;
                border: none;
                color: white;
                border-radius: 5px;
                cursor: pointer;
            }

            #user:hover {
                background: #1D4ED8;
            }

            .userselect {
                display: flex;
                justify-content: center;
                align-items: center;
            }
        </style>
        <div style="display: grid; gap: 3rem; grid-template-columns: 1fr 3fr 1fr;" class="nav-users">
            <div class="userselect">
                <select name="user" id="user">
                    <option value="selected">Selecteer</option>
                </select>
            </div>


            <div class="nav">
                <h2><a href="{{ route('index') }}">Beheer</a></h2>
                <h3><a href="{{ route('klanten.index') }}">Kla</a></h3>
                <h3><a href="{{ route('klanten.index') }}">Fac</a></h3>
                <h3><a href="{{ route('klanten.index') }}">Gene</a></h3>
                <h3><a href="{{ route('klanten.index') }}">Bes</a></h3>
            </div>

            <div class="svg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="48" height="48" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z" />
                </svg>
            </div>

            <style>
                .nav {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    gap: 20px;
                }

                .svg {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }

                svg {
                    cursor: pointer;
                    color: #2563EB;
                }

                svg:hover {
                    color: #1D4ED8;
                }
            </style>

        </div>


        @if(session('success'))
        <div style="background: #d4edda; color: #155724; padding: 10px; margin-bottom: 10px;">
            {{ session('success') }}
        </div>
        @endif

        
    </div>
    <div class="main" style="margin-top: 80px;">
        @yield('content')
    </div>
</body>

</html>