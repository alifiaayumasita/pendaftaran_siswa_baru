<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Layout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .under-navbar {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .cards-container {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
            max-width: 1200px;
            margin: 0 auto;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0px 4px 10px orange;
            border: 1px solid #e2e8f0;
            width: 100%;
            padding: 20px;
            box-sizing: border-box;
            background-color: white;
            margin: 10px 0;
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
            background-color: #2779bd;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .card-button:hover {
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

        .info-pair {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            margin-bottom: 10px;
        }

        .label {
            flex-basis: 30%; 
            text-align: right;
            padding-right: 10px;
            font-weight: bold;
        }

        .field {
            flex-basis: 70%;
        }
       
        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .edit-link {
            display: inline-block;
            background-color: rgb(70, 181, 218);
            color: white;
            padding: 8px 16px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease-in-out;
        }

        .edit-link:hover {
            background-color: #136aad;
        }

        .delete-button {
            padding: 8px 16px;
            background-color: #d9534f;
            color: whitesmoke;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .delete-button:hover {
            background-color: #c9302c;
            color: antiquewhite
        }
        
        .image-container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 4cm;
            height: 4cm;
            border-radius: 50%;
            border: 2px solid #ccc;
            overflow: hidden;
            margin: 0 auto; /* Center the container horizontally */
            box-shadow: 0px 4px 10px #ccc;
        }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        @media (max-width: 768px) {
            .info-pair {
                flex-direction: column;
            }

            .label {
                text-align: left;
                padding-right: 0;
                font-weight: bold;
            }

            .field {
                flex-basis: 100%;
            }
        }
    </style>
</head>
<body>
    <x-app-layout>
        <div class="under-navbar">
            <div class="cards-container">
                <div class="card">
                    <table>
                        @if ($students->isEmpty())
                            <div class="card-header">
                                <div class="card-title">Welcome, {{ Auth::user()->name }}</div>
                            </div>
                            <p>You're not have any registration data, Please register below</p><br><br>
                            <a href="{{ url('/add_new_student') }}" class="card-button">Register Now</a>
                        @else
                            @foreach ($students as $student)
                                <div class="card-header">
                                    <div class="card-title">Registration Data</div>
                                </div>
                                
                                
                                <div class="student-info">
                                    
                                    <div class="info-pair">
                                        <div class="image-container">
                                            @if($student->image)
                                                <img src="{{ asset('storage/images/'.$student->image) }}" alt="Student Image">
                                            @else
                                                <span>No image found!</span>
                                            @endif
                                        </div><br><br>
                                    </div>   
                                    <div class="info-pair">
                                        <span class="label">Name:</span>
                                        <span class="field">{{ $student->name }}</span>
                                    </div>
                                    <div class="info-pair">
                                        <span class="label">Address:</span>
                                        <span class="field">{{ $student->address }}</span>
                                    </div>
                                    <div class="info-pair">
                                        <span class="label">Current Address:</span>
                                        <span class="field">{{ $student->current_address }}</span>
                                    </div>
                                    <div class="info-pair">
                                        <span class="label">Phone:</span>
                                        <span class="field">{{ $student->phone }}</span>
                                    </div>
                                    <div class="info-pair">
                                        <span class="label">Mobile:</span>
                                        <span class="field">{{ $student->mobile }}</span>
                                    </div>
                                    <div class="info-pair">
                                        <span class="label">Email:</span>
                                        <span class="field">{{ $student->email }}</span>
                                    </div>
                                    <div class="info-pair">
                                        <span class="label">Nationality:</span>
                                        <span class="field">{{ $student->nationality }}</span>
                                    </div>
                                    <div class="info-pair">
                                        <span class="label">Birthday:</span>
                                        <span class="field">{{ $student->birthday }}</span>
                                    </div>
                                    <div class="info-pair">
                                        <span class="label">Gender:</span>
                                        <span class="field">{{ $student->gender }}</span>
                                    </div>
                                    <div class="info-pair">
                                        <span class="label">Status:</span>
                                        <span class="field">{{ $student->status }}</span>
                                    </div>
                                    <div class="info-pair">
                                        <span class="label">Religion:</span>
                                        <span class="field">{{ $student->religion }}</span>
                                    </div>
                                </div>

                                <div class="related-data">
                                    <div class="info-pair">
                                        <span class="label">City:</span>
                                        <span class="field">{{ $student->city }}</span>
                                    </div>
                                    <div class="info-pair">
                                        <span class="label">Province:</span>
                                        <span class="field">{{ $student->province }}</span>
                                    </div>
                                    <div class="info-pair">
                                        <span class="label">Birth City:</span>
                                        <span class="field">{{ $student->birth_city }}</span>
                                    </div>
                                    <div class="info-pair">
                                        <span class="label">Birth Province:</span>
                                        <span class="field">{{ $student->birth_province }}</span>
                                    </div>
                                </div>
                                <div class="actions">
                                    <a href="{{ route('edit_student', $student->id) }}" class="edit-link">Edit Registration</a>
                                    <form action="{{ route('delete_student', $student->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="delete-button" onclick="return confirm('Are you sure you want to delete this student?')">Remove Registration</button>
                                    </form>
                                </div>
                            @endforeach
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>
</html>