<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Layout</title>
    <style>
        body {
        }

        .under-navbar {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .cards-container {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
            max-width: 1200px; /* Adjust as needed */
        }

        .card {
            border-radius: 10px;
            box-shadow: 0px 4px 10px orange;
            border: 1px solid #e2e8f0;
            width: 100%; /* Take full width of container */
            padding: 20px;
            box-sizing: border-box;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .card-title {
            font-size: 24px;
            font-weight: bolder;
            color: rgba(255, 145, 0, 0.856);
        }

        .card-button {
            padding: 8px 16px;
            background-color: rgb(255, 213, 135);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .card-button:hover {
            background-color: #2779bd;
        }

        .submit-btn {
            padding: 8px 16px;
            background-color: #2779bd;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .submit-btn:hover {
            background-color: lightblue;
        }

        .table {
            border-collapse: collapse;
            width: 100%;
        }

        .table th,
        .table td {
            padding: 10px;
            border-bottom: 1px solid #e2e8f0;
        }

        .table th {
            text-align: left;
        }

        .table tr:last-child td {
            border-bottom: none;
        }

        /* Target specific input types excluding submit */
        input.input-field[type="text"],
        input.input-field[type="email"],
        input.input-field[type="password"],
        select.input-field {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            background-color: #f5f5f5;
            margin-bottom: 10px;
            box-sizing: border-box;
            transition: box-shadow 0.3s ease-in-out;
        }

        /* Apply focus styling to specific input types excluding submit */
        input.input-field[type="text"]:focus,
        input.input-field[type="email"]:focus,
        input.input-field[type="password"]:focus,
        select.input-field:focus {
            outline: none;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <x-app-layout>
        <div class="under-navbar">
            <div class="cards-container">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">User List</div>
                        <a href="{{ url('/redirects') }}" class="btn btn-primary"><button class="card-button">Back</button></a>
                    </div>
                    <form action="{{ url('/addnewuser') }}" method="POST">
                        @csrf
            
                        <div>
                            <label>Name</label>
                            <input type="text" class="input-field"  name="name" required="">
                        </div>
                        <div>
                            <label>Email</label>
                            <input type="email" class="input-field"  name="email" required="">
                        </div>
                        <div>
                            <label>Password</label>
                            <input type="password" class="input-field"  name="password" required="">
                        </div>
                        <div>
                            <label>Role</label>
                            <select class="input-field"  name="role" required="">
                                <option value="0">Student</option>
                                <option value="1">Admin</option>
                            </select>
                        </div>
                        <div>
                            <button class="submit-btn">
                                <input type="submit" value="Submit">
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>
</html>
