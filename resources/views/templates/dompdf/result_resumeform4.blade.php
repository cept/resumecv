<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: -50px;
            padding: 0;
            background-color: #ffffff;
            box-sizing: border-box;
        }

        .kotakColor {
            background-color: rgb(30, 30, 75);
        }
        .kotakHeader {
            margin-left: -50px;
            width: 290px;
            height: 60px;
        }

        .kotakFooter {
            margin-left: 290px;
            margin-bottom: -50px;
            width: 100%;
            height: 60px;
            position: absolute;
            bottom: 0;
        }
        .resume {
            width: 700px;
            height: 1123px;
            margin: auto;
            /* background-color: #ffffff; */
            /* padding: 20px; */
            /* box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); */
        }
        .profile-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            /* margin: 0 auto; */
        }
        .header {
            text-align: center;
            /* background-color: burlywood; */
            /* margin-top: 20px; */
        }
        .contact-info {
            text-align: left;
            /* margin-top: 10px; */
            /* background-color: burlywood; */
        }
        .summary {
            /* margin-top: 10px; */
            /* margin-left: 20px; */
            /* background-color: burlywood; */
        }
        .section-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            /* margin-top: 10px; */
        }
        th, td {
            /* border: 1px solid #dddddd; */
            padding: 0;
            text-align: left;
        }
        
    </style>
</head>
<body>
    <div class="resume">
        <div class="kotakHeader kotakColor"></div>
        <table>
            <tr>
                <td colspan="4" class="header">
                    <img src="{{ $imageUrl }}" alt="Profile Picture" class="profile-img mb-2">
                    <h1>Your Name</h1>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="contact-info">
                    <p>Email: your@email.com</p>
                    <p>Phone: (123) 456-7890</p>
                    <p>Location: City, Country</p>
                </td>
                <td colspan="2" class="summary">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus fringilla tincidunt risus.adsjhdhshdahdhsdhh</p>
                </td>
            </tr>
            <tr>
                <td colspan="4" class="section-title">Experience</td>
            </tr>
            <tr>
                <td colspan="4">
                    <p><strong>Job Title - Company Name</strong><br>
                    Dates<br>
                    Job description...</p>
                </td>
            </tr>
            <tr>
                <td colspan="4" class="section-title">Education</td>
            </tr>
            <tr>
                <td colspan="4">
                    <p><strong>Degree - University Name</strong><br>
                    Year<br>
                    Additional details...</p>
                </td>
            </tr>
            <tr>
                <td colspan="4" class="section-title">Skills</td>
            </tr>
            <tr>
                <td colspan="2">
                    <ul>
                        <li>Skill 1</li>
                        <li>Skill 2</li>
                    </ul>
                </td>
                <td colspan="2">
                    <ul>
                        <li>Skill 3</li>
                        <li>Skill 4</li>
                    </ul>
                </td>
            </tr>
        </table>
    </div>
    <div class="kotakFooter kotakColor"></div>
</body>
</html>
