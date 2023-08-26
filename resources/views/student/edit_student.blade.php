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
                    <div class="card-title">Edit Student</div>
                    <a href="{{ url('/redirects') }}" class="btn btn-primary"><button class="card-button">Back</button></a>
                </div>
                    <form action="{{ route('update_student', $student->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div>
                            <label>Name</label>
                            <input class="input-field" type="text" name="name" value="{{ $student->name }}" required>
                        </div>
                        <div>
                            <label for="address">ID Address</label>
                            <textarea name="address" required>{{ $student->address }}</textarea><br>
                        </div>
                        <div>
                            <label for="current_address">Current Address</label>
                            <textarea name="current_address" required>{{ $student->current_address }}</textarea><br>
                        </div>
                        <div>
                            <label for="subdistrict">Subdistrict</label>
                            <input class="input-field" type="text" name="subdistrict" value="{{ $student->subdistrict }}" required><br>
                        </div>
                        <div>
                            <label for="city">City</label>
                            <input class="input-field" type="text" name="city" value="{{ $student->city }}" required><br>
                        </div>
                        <div>
                            <label for="province">Province</label>
                            <input class="input-field" type="text" name="province" value="{{ $student->province }}" required><br>
                        <div></div>    
                            <label for="phone">Phone</label>
                            <input class="input-field" type="number" name="phone" value="{{ $student->phone }}"><br>
                        </div>
                        <div>        
                            <label for="mobile">Mobile</label>
                            <input class="input-field" type="number" name="mobile" value="{{ $student->mobile }}" required><br>
                        </div>
                        <div>
                            <label for="email">Email</label>
                            <input class="input-field" type="email" name="email" value="{{ $student->email }}" required><br>
                        </div>
                        <div>
                            <label for="nationality">Nationality</label>
                            <input type="radio" name="nationality" value="WNI" id="wniRadio" {{ $student->nationality === 'WNI' ? 'checked' : '' }}> WNI
                            <input type="radio" name="nationality" value="WNA" id="wnaRadio" {{ $student->nationality === 'WNA' ? 'checked' : '' }}> WNA
                            <input type="radio" name="nationality" id="otherRadio" {{ $student->nationality !== 'WNI' && $student->nationality !== 'WNA' ? 'checked' : '' }}> Other
                            <input type="text" name="otherNationality" id="otherNationality" style="{{ $student->nationality !== 'WNI' && $student->nationality !== 'WNA' ? 'display: block;' : 'display: none;' }}" placeholder="Enter other nationality" value="{{ $student->nationality }}"><br>
                        </div> 
                        <div>
                            <label for="birthday">Birthday</label>
                            <input class="input-field" type="date" name="birthday" value="{{ $student->birthday }}" required><br>
                        </div>
                        <div>
                            <label for="birthCity">Birth City</label>
                            <input class="input-field" type="text" name="birthCity" value="{{ $student->birth_city }}" required><br>
                        </div>
                        <div>
                            <label for="birthProvince">Birth Province</label>
                            <input class="input-field" type="text" name="birthProvince" value="{{ $student->birth_province }}" required><br>
                        </div>
                        <div>
                            <label for="gender">Gender</label>
                            <select class="input-field"  name="gender" value="{{ $student->gender }}">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select><br>
                        </div>
                        <div>
                            <label for="status">Status</label>
                            <select class="input-field"  name="status" value="{{ $student->status }}">
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Divorced">Other</option></option>
                            </select><br>
                        </div>
                        <div>
                            <label for="religion" value="{{ $student->religion }}">Religion</label>
                            <select class="input-field"  name="religion">
                                <option value="Islam">Islam</option>
                                <option value="Christianity">Christianity</option>
                                <option value="Hinduism">Hinduism</option>
                                <option value="Buddhism">Buddhism</option>
                                <option value="Other">Other</option>
                            </select><br>
                        </div>
                        <div>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="image" @error('image') is-invalid @enderror>
                                @if($student->image)
                                    <img src="{{ asset('storage/images/'.$student->image) }}" style="max-width: 100%; max-height: 50px; margin-top: 5px;">
                                @else 
                                    <span>No image found!</span>
                                @endif
                            </div>
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div>
                            <button class="submit-btn">
                                <input type="submit" value="Update">
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            const wniRadio = document.getElementById("wniRadio");
            const wnaRadio = document.getElementById("wnaRadio");
            const otherRadio = document.getElementById("otherRadio");
            const otherInput = document.getElementById("otherNationality");
        
            function showOtherInput() {
                otherInput.style.display = "block";
                otherInput.setAttribute("required", "required");
            }
        
            function hideOtherInput() {
                otherInput.style.display = "none";
                otherInput.removeAttribute("required");
            }
        
            otherRadio.addEventListener("change", function() {
                if (this.checked) {
                    showOtherInput();
                } else {
                    hideOtherInput();
                }
            });
        
            wniRadio.addEventListener("change", function() {
                if (!otherRadio.checked) {
                    hideOtherInput();
                }
            });
        
            wnaRadio.addEventListener("change", function() {
                if (!otherRadio.checked) {
                    hideOtherInput();
                }
            });
        
            if (otherRadio.checked) {
                showOtherInput();
            }
        </script>
    </x-app-layout>