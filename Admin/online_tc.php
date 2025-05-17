<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Transfer Certificate Generator</title>
    
    <style>
        /* Basic styles for the transfer certificate generator */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 70%;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            text-align: center;
        }
        .form-container {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            display: block;
            margin: 5px 0;
        }
        input[type="text"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
            resize: vertical;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background-color: #45a049;
        }
        .output-container {
            margin-top: 30px;
            background-color: #e8e8e8;
            padding: 15px;
            border-radius: 5px;
        }
        #generatedTC {
            background-color: #fff;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            white-space: pre-wrap;
            word-wrap: break-word;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Online Transfer Certificate Generator</h1>
        
        <div class="form-container">
            <label for="studentName">Student Name:</label>
            <input type="text" id="studentName" placeholder="Enter Student Name">
            
            <label for="rollNumber">Roll Number:</label>
            <input type="text" id="rollNumber" placeholder="Enter Roll Number">
            
            <label for="course">Course:</label>
            <input type="text" id="course" placeholder="Enter Course">
            
            <label for="dateOfAdmission">Date of Admission:</label>
            <input type="date" id="dateOfAdmission">
            
            <label for="dateOfLeaving">Date of Leaving:</label>
            <input type="date" id="dateOfLeaving">
            
            <label for="reasonForLeaving">Reason for Leaving:</label>
            <textarea id="reasonForLeaving" placeholder="Enter Reason for Leaving"></textarea>
            
            <button onclick="generateTC()">Generate Transfer Certificate</button>
        </div>

        <div class="output-container">
            <h2>Generated Transfer Certificate</h2>
            <pre id="generatedTC">Your transfer certificate will appear here...</pre>
            <button id="downloadBtn" style="display:none" onclick="downloadCertificate()">Download Certificate</button>
        </div>
    </div>

    <script>
        function generateTC() {
            const studentName = document.getElementById('studentName').value;
            const rollNumber = document.getElementById('rollNumber').value;
            const course = document.getElementById('course').value;
            const dateOfAdmission = document.getElementById('dateOfAdmission').value;
            const dateOfLeaving = document.getElementById('dateOfLeaving').value;
            const reasonForLeaving = document.getElementById('reasonForLeaving').value;

            if (!studentName || !rollNumber || !course || !dateOfAdmission || !dateOfLeaving || !reasonForLeaving) {
                alert('Please fill in all fields.');
                return;
            }

            const transferCertificate = `
            Transfer Certificate
            
            Student Name: ${studentName}
            Roll Number: ${rollNumber}
            Course: ${course}
            
            Date of Admission: ${dateOfAdmission}
            Date of Leaving: ${dateOfLeaving}
            
            Reason for Leaving: 
            ${reasonForLeaving}
            
            This is to certify that the above student has left the institution on the specified date. 
            We wish them all the best in their future endeavors.
            `;

            document.getElementById('generatedTC').textContent = transferCertificate;
            document.getElementById('downloadBtn').style.display = 'block';
        }

        function downloadCertificate() {
            const transferCertificate = document.getElementById('generatedTC').textContent;
            const blob = new Blob([transferCertificate], { type: 'text/plain' });
            const link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.download = 'Transfer_Certificate.txt';
            link.click();
        }
    </script>
</body>
</html>
