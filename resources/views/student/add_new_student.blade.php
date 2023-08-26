<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Layout</title>
    <style>
        .card-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f0f0f0;
            margin: 0;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0px 4px 10px orange;
            border: 1px solid #e2e8f0;
            width: 100%;
            max-width: 60%; /* Adjust as needed */
            padding: 20px;
            margin: 20px;
            box-sizing: border-box;
            background-color: white;
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
            color: whitesmoke;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .submit-btn:hover {
            background-color: lightblue;
            color: whitesmoke;
        }

        input.input-field[type="text"],
        input.input-field[type="email"],
        input.input-field[type="date"],
        input.input-field[type="number"],
        input.input-field[type="password"],
        select.input-field,
        textarea {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 6px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            background-color: #f5f5f5;
            margin-bottom: 10px;
            box-sizing: border-box;
            transition: box-shadow 0.3s ease-in-out;
        }

        input.input-field[type="text"]:focus,
        input.input-field[type="email"]:focus,
        input.input-field[type="password"]:focus,
        select.input-field:focus
        textarea:focus {
            outline: none;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <x-app-layout>
        <div class="card-wrapper">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Add Student</div>
                    <a href="{{ url('/redirects') }}" class="btn btn-primary"><button class="card-button">Back</button></a>
                </div>
                <form action="{{ route('addnewstudent') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div>
                            <label>Name</label>
                            <input class="input-field" type="text" name="name"required>
                        </div>
                        <div>
                            <label for="address">ID Address</label>
                            <textarea name="address" required></textarea><br>
                        </div>
                        <div>
                            <label for="current_address">Current Address</label>
                            <textarea name="current_address" required></textarea><br>
                        </div>
                        <div>
                            <label for="subdistrict">Subdistrict</label>
                            <input class="input-field" type="text" name="subdistrict" required><br>
                        </div>
                        {{-- <div>
                            <select class="input-field" id="provinceSelect" name="province">
                                <option value="">Select Province</option>
                                @foreach($dataProvinsi as $provinsi)
                                    <option value="{{ $provinsi->name }}">{{ $provinsi->name }}</option>
                                @endforeach
                            </select>
                        
                            <!-- City Selection -->
                            <select class="input-field" id="citySelect" name="city">
                                <option value="">Select City</option>
                                @foreach($kotaList as $kota)
                                    <option value="{{ $kota->name }}">{{ $kota->name }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div>
                            <label for="city">City</label>
                            <input class="input-field" type="text" name="city" required><br>
                        </div>
                        <div>
                            <label for="province">Province</label>
                            <input class="input-field" type="text" name="province" required><br>
                        <div>
                            </div>    
                            <label for="phone">Phone</label>
                            <input class="input-field" type="number" name="phone"><br>
                        </div>
                        <div>        
                            <label for="mobile">Mobile</label>
                            <input class="input-field" type="number" name="mobile" required><br>
                        </div>
                        <div>
                            <label for="email">Email</label>
                            <input class="input-field" type="email" name="email" required><br>
                        </div>
                        <div>
                            <label for="nationality">Nationality:</label><br>
                            <input class="input-field" type="radio" name="nationality" value="WNI" id="wniRadio"> <label for="wniRadio">WNI</label><br>
                            <input class="input-field" type="radio" name="nationality" value="WNA" id="wnaRadio"> <label for="wnaRadio">WNA</label><br>
                            {{-- <input class="input-field" type="radio" name="nationality" id="otherRadio" for="otherNationality"> <label for="otherRadio">Other</label><br>
                            <input class="input-field" type="text" name="otherNationality" id="otherNationality" style="display: none;" placeholder="Enter other nationality"><br> --}}
                        </div>
                        <div>
                            <label for="birthday">Birthday</label>
                            <input class="input-field" type="date" name="birthday" required><br>
                        </div>
                        <div>
                            <label for="birthCity">Birth City</label>
                            <input class="input-field" type="text" name="birthCity" required><br>
                        </div>
                        <div>
                            <label for="birthProvince">Birth Province</label>
                            <input class="input-field" type="text" name="birthProvince" required><br>
                        </div>
                        <div>
                            <label for="gender">Gender</label>
                            <select class="input-field"  name="gender" >
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select><br>
                        </div>
                        <div>
                            <label for="status">Status</label>
                            <select class="input-field"  name="status">
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Divorced">Other</option></option>
                            </select><br>
                        </div>
                        <div>
                            <label for="religion">Religion</label>
                            <select class="input-field"  name="religion">
                                <option value="Islam">Islam</option>
                                <option value="Christianity">Christianity</option>
                                <option value="Hinduism">Hinduism</option>
                                <option value="Buddhism">Buddhism</option>
                                <option value="Other">Other</option>
                            </select><br>
                        </div>
                        <div class="col-sm-9">
                            <label class="col-sm-3 col-form-label">Profile Pic</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="image" @error('image') is-invalid @enderror>
                            </div>
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
