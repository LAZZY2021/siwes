<!doctype html>
<html>

<head>
    <title>SMS System | Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Student Registration Form Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet" type='text/css' media="all" />
    <link href="css/style.css" rel="stylesheet" type='text/css' media="all" />
    <style>
        .password-reset-modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .password-reset-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 0;
            border-radius: 10px;
            width: 95%;
            max-width: 700px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .password-strength {
            height: 5px;
            transition: all 300ms ease;
        }

        .password-strength.weak {
            background-color: #ef4444;
            width: 25%;
        }

        .password-strength.medium {
            background-color: #f59e0b;
            width: 50%;
        }

        .password-strength.strong {
            background-color: #10b981;
            width: 75%;
        }

        .password-strength.very-strong {
            background-color:rgb(239, 103, 103);
            width: 100%;
        }

        .shake {
            animation: shake 0.5s;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
        }

        .modal-header {
            background-color:rgb(239, 103, 103);
            padding: 1.5rem;
            color: white;
            position: relative;
            text-align: center;
        }

        .close-modal {
            color: #f1f1f1;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            position: absolute;
            top: 1.2rem;
            left: 40%;
            transform: translateX(-50%);
        }

        .close-modal:hover {
            color: white;
        }

        .modal-body {
            padding: 1.5rem;
        }

        .code-input {
            width: 3rem;
            height: 3rem;
            text-align: center;
            font-size: 1.25rem;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
        }

        .success-message {
            text-align: center;
            padding: 2rem 0;
        }

        .btn-primary {
            background-color:rgb(236, 105, 105) !important;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        .btn-primary:hover {
            background-color:rgb(198, 85, 85) !important;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-secondary:hover {
            background-color: #adb5bd;
        }

        .mau-email-notice {
            font-size: 0.8rem;
            color: #666;
            margin-top: 0.5rem;
        }

        .text-b30000 {
            color:rgb(157, 43, 43) !important;
        }

        .text-red-500,
        .text-blue-500 {
            color:rgb(141, 52, 52) !important;
        }

        .bg-red-100,
        .bg-blue-500,
        .bg-blue-600,
        .bg-blue-700,
        .bg-blue-800,
        .bg-blue-900 {
            background-color:rgb(155, 68, 68) !important;
        }

        /* Custom override for Tailwind buttons used */
        #sendCodeBtn:hover,
        #verifyCodeBtn:hover,
        #resetPasswordBtn:hover,
        #closeSuccessBtn:hover {
            background-color:rgb(203, 138, 138) !important;
        }
    </style>
</head>


<body style="background-image:url('images/programming-wallpaper-hd-6-786124.jpg'); background-size:cover; background-position:center;">

    <div class="content-agileits" style="background-color:white;">
        <!-- University Header -->
        <h1 class="title" style="font-weight:bold; font-size:25px; font-family:arial; color:white; background-color:#D07348; text-align:center;">MODIBBO ADAMA UNIVERSITY YOLA</h1>    
        <h3 class="title" style="font-weight:bold; font-size:20px; font-family:arial; color:white; background-color:#D07348; padding:10px; text-align:center;">SIWES MANAGEMENT SYSTEM</h3>
        
        <!-- Flex Container for Logo + Login -->
        <div style="display:flex; justify-content:center; align-items:center; padding:40px;">
            
            <!-- Left Side: Logo -->
            <div style="flex:1; display:flex; justify-content:center; align-items:center;">
                <img src="images/school-logo.gif" class="img-responsive" style="width:250px; max-width:90%;">
            </div>

            <!-- Right Side: Login Form -->
            <div style="flex:1; background:white; padding:30px; border-radius:10px; box-shadow:0 4px 12px rgba(0,0,0,0.2);">
                <div class="msg"></div>
                <form method="post" data-toggle="validator" id="formlogin">
                    <h2 style="text-align:center; padding-bottom:25px; font-weight:bold; font-size:22px; color:#D07348; margin-top:20px;">Student Login Portal</h2>
                    
                    <input type="hidden" name="login" value="login" />

                    <div class="form-group">
                        <label for="username" class="control-label">Matric No:</label>
                        <input type="text" class="form-control" name="matric_no" id="inputEmail" placeholder="Enter Matric No" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputPassword" class="control-label">Password:</label>
                        <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Enter Password" required>
                    </div>
                    
                    <br>
                    <div style="width:100%; text-align:center;">
                        <button type="submit"
                            style="background-color:#D07348; color:white; border:2px solid #D07348;
                                   font-size:16px; font-weight:bold; padding:10px; border-radius:5px;
                                   width:100%; cursor:pointer;"
                            onmouseover="this.style.backgroundColor='white'; this.style.color='#D07348';"
                            onmouseout="this.style.backgroundColor='#D07348'; this.style.color='white';">
                            Log in
                        </button>
                    </div>

                    <br>
                    <div style="text-align:center;">
                        <a href="#" id="forgotPasswordBtn" class="btn btn-link" style="color:rgb(234, 23, 23); font-weight:bold;">
                            <i class="fas fa-key"></i> Forgot Password?
                        </a>
                    </div>

                    <br>
                    <div style="text-align:center;">
                        <a href="staff/index.php"><button type="button" class="btn btn-danger">Staff login portal</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div
    <!-- Password Reset Modal --> <div id="passwordResetModal" class="password-reset-modal"> <div class="password-reset-content"> <div class="modal-header"> <div class="flex items-center justify-between"> <h1 class="text-2xl font-bold">Reset Password</h1> <span class="close-modal">&times;</span> </div> <p class="mt-2 opacity-90">Enter your MAU email to reset your password</p> </div> <div class="modal-body"> <div id="emailStep" class="space-y-4"> <div> <label for="resetEmail" class="block text-sm font-medium text-gray-700 mb-1">MAU Email Address</label> <div class="relative"> <input type="email" id="resetEmail" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-red-500 focus:border-red-500 transition" placeholder="Enter your @student.mau.edu.ng email"> <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none"> <i class="fas fa-envelope text-gray-400"></i> </div> </div> <p class="mau-email-notice">Must be your official MAU email (@student.mau.edu.ng)</p> <p id="emailError" class="mt-1 text-sm text-red-600 hidden"></p> </div> <button id="sendCodeBtn" class="btn-primary py-3 px-4 flex items-center justify-center"> <span>Send Reset Code</span> <i class="fas fa-paper-plane ml-2"></i> </button> </div> <div id="codeStep" class="space-y-4 hidden"> <div class="text-center"> <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3"> <i class="fas fa-check-circle text-green-500 text-3xl"></i> </div> <p class="text-gray-600">We've sent a 6-digit verification code to <span id="displayEmail" class="font-medium text-b30000"></span></p> </div> <div> <label for="code" class="block text-sm font-medium text-gray-700 mb-1">Verification Code</label> <div class="flex space-x-2 justify-center"> <input type="text" maxlength="1" class="code-input" pattern="[0-9]"> <input type="text" maxlength="1" class="code-input" pattern="[0-9]"> <input type="text" maxlength="1" class="code-input" pattern="[0-9]"> <input type="text" maxlength="1" class="code-input" pattern="[0-9]"> <input type="text" maxlength="1" class="code-input" pattern="[0-9]"> <input type="text" maxlength="1" class="code-input" pattern="[0-9]"> </div> <p id="codeError" class="mt-1 text-sm text-red-600 hidden"></p> </div> <div class="flex justify-between items-center"> <button id="resendCodeBtn" class="text-sm text-black hover:underline disabled:text-gray-400" disabled> <span>Resend code in <span id="countdown">60</span>s</span> </button> <button id="verifyCodeBtn" class="btn-primary py-2 px-4"> Verify Code </button> </div> </div> <div id="passwordStep" class="space-y-4 hidden"> <div class="text-center"> <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-3"> <i class="fas fa-key text-b30000 text-3xl"></i> </div> <h2 class="text-xl font-semibold text-gray-800">Create New Password</h2> <p class="text-gray-600 mt-1">Your new password must be different from previous used passwords</p> </div> <div> <label for="newPassword" class="block text-sm font-medium text-gray-700 mb-1">New Password</label> <div class="relative"> <input type="password" id="newPassword" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-red-500 focus:border-red-500 transition" placeholder="Enter new password"> <button id="togglePassword" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-gray-600"> <i class="fas fa-eye"></i> </button> </div> <div class="mt-2 flex items-center"> <div class="password-strength weak rounded-full mr-2"></div> <span id="strengthText" class="text-xs font-medium">Weak</span> </div> <ul class="mt-2 text-xs text-gray-500 space-y-1"> <li id="lengthReq" class="flex items-center"><i class="fas fa-check-circle text-green-500 mr-1 hidden"></i> At least 8 characters</li> <li id="numberReq" class="flex items-center"><i class="fas fa-check-circle text-green-500 mr-1 hidden"></i> Contains a number</li> <li id="specialReq" class="flex items-center"><i class="fas fa-check-circle text-green-500 mr-1 hidden"></i> Contains a special character</li> </ul> </div> <div> <label for="confirmPassword" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label> <div class="relative"> <input type="password" id="confirmPassword" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-red-500 focus:border-red-500 transition" placeholder="Confirm your password"> <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none"> <i class="fas fa-lock text-gray-400"></i> </div> </div> <p id="passwordError" class="mt-1 text-sm text-red-600 hidden"></p> </div> <button id="resetPasswordBtn" class="btn-primary py-3 px-4"> Reset Password </button> </div> <div id="successStep" class="success-message hidden"> <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4"> <i class="fas fa-check-circle text-green-500 text-4xl"></i> </div> <h2 class="text-2xl font-bold text-gray-800 mb-2">Password Reset Successful!</h2> <p class="text-gray-600 mb-6">Your password has been updated successfully. You can now sign in with your new password.</p> <button id="closeSuccessBtn" class="btn-primary py-2 px-6"> Continue to Sign In </button> </div> </div> </div> </div>
    
    <p class="copyright-w3ls">© <?php echo date("Y");?> Siwes Management System. All Rights Reserved | Design by
        <a href="#" target="_blank">Lazarus Solomon</a>
    </p>
    <!-- js -->
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/validator.min.js"></script>
    
    <script>
    $(document).ready(function(){
        // Original form submission handlers
        $("a.register").click(function(){
            $("form#formlogin").hide();
            $("form#formregister").fadeIn();
        });
        
        $("a.login").click(function(){
            $("form#formregister").hide();
            $("form#formlogin").fadeIn();
        });
        
        $("#formlogin").on('submit',(function(e){
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "operation_exe.php",
                data: new FormData(this),
                contentType:false,
                processData:false,
                cache: false,
                success: function(data){ 
                    $("div.msg").html(data);
                } 
            });
        }));
        
        $("#formregister").on('submit',(function(e){
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "operation_exe.php",
                data: new FormData(this),
                contentType:false,
                processData:false,
                cache: false,
                success: function(data){ 
                    $("div.msg").html(data);
                } 
            });
        }));
        
        // Password reset modal functionality
        const modal = document.getElementById('passwordResetModal');
        const btn = document.getElementById('forgotPasswordBtn');
        const span = document.querySelector('.close-modal');
        const closeSuccessBtn = document.getElementById('closeSuccessBtn');
        
        // Steps
        const emailStep = document.getElementById('emailStep');
        const codeStep = document.getElementById('codeStep');
        const passwordStep = document.getElementById('passwordStep');
        const successStep = document.getElementById('successStep');
        
        // Inputs and buttons
        const emailInput = document.getElementById('resetEmail');
        const sendCodeBtn = document.getElementById('sendCodeBtn');
        const verifyCodeBtn = document.getElementById('verifyCodeBtn');
        const resendCodeBtn = document.getElementById('resendCodeBtn');
        const codeInputs = document.querySelectorAll('#codeStep .code-input');
        const newPassword = document.getElementById('newPassword');
        const confirmPassword = document.getElementById('confirmPassword');
        const togglePassword = document.getElementById('togglePassword');
        const resetPasswordBtn = document.getElementById('resetPasswordBtn');
        const displayEmail = document.getElementById('displayEmail');
        
        // Error messages
        const emailError = document.getElementById('emailError');
        const codeError = document.getElementById('codeError');
        const passwordError = document.getElementById('passwordError');
        
        // Password strength
        const strengthBar = document.querySelector('.password-strength');
        const strengthText = document.getElementById('strengthText');
        const lengthReq = document.getElementById('lengthReq');
        const numberReq = document.getElementById('numberReq');
        const specialReq = document.getElementById('specialReq');
        const countdownElement = document.getElementById('countdown');
        
        // Variables
        let countdown;
        let countdownTime = 60;
        let generatedCode = '';
        const universityDomain = 'student.mau.edu.ng'; // MAU email domain
        
        // Open modal
        btn.onclick = function() {
            modal.style.display = "block";
            resetModal();
        }
        
        // Close modal
        span.onclick = function() {
            modal.style.display = "none";
            resetModal();
        }
        
        closeSuccessBtn.onclick = function() {
            modal.style.display = "none";
            resetModal();
        }
        
        // Close when clicking outside
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
                resetModal();
            }
        }
        
        // Handle code input fields
        codeInputs.forEach((input, index) => {
            // Allow only numbers
            input.addEventListener('input', (e) => {
                if (!/^\d$/.test(e.target.value)) {
                    e.target.value = '';
                    return;
                }
                
                if (e.target.value && index < codeInputs.length - 1) {
                    codeInputs[index + 1].focus();
                }
            });
            
            // Handle backspace
            input.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace' && !e.target.value && index > 0) {
                    codeInputs[index - 1].focus();
                }
            });
        });
        
        // Validate MAU email format
        function isValidMauEmail(email) {
            const emailRegex = new RegExp(`^[^\\s@]+@${universityDomain.replace('.', '\\.')}$`, 'i');
            return emailRegex.test(email);
        }
        
        // Send verification code
        sendCodeBtn.addEventListener('click', function() {
            const email = emailInput.value.trim();
            
            // Validate email
            if (!email) {
                showError(emailError, 'MAU email is required');
                shakeElement(emailInput);
                return;
            }
            
            if (!isValidMauEmail(email)) {
                showError(emailError, `Please use your @${universityDomain} email address`);
                shakeElement(emailInput);
                return;
            }
            
            // Hide error if valid
            hideError(emailError);
            
            // Generate random 6-digit code
            generatedCode = '';
            for (let i = 0; i < 6; i++) {
                generatedCode += Math.floor(Math.random() * 10);
            }
            
            console.log('Generated verification code:', generatedCode); // For demo purposes
            
            // Show code step
            displayEmail.textContent = email;
            emailStep.classList.add('hidden');
            codeStep.classList.remove('hidden');
            
            // Start countdown
            startCountdown();
        });
        
        // Verify code
        verifyCodeBtn.addEventListener('click', function() {
            let enteredCode = '';
            codeInputs.forEach(input => {
                enteredCode += input.value;
            });
            
            if (enteredCode.length !== 6) {
                showError(codeError, 'Please enter the full 6-digit code');
                shakeElement(codeInputs[0].parentElement);
                return;
            }
            
            if (enteredCode !== generatedCode) {
                showError(codeError, 'Invalid verification code');
                shakeElement(codeInputs[0].parentElement);
                return;
            }
            
            // Hide error if valid
            hideError(codeError);
            
            // Show password step
            codeStep.classList.add('hidden');
            passwordStep.classList.remove('hidden');
            
            // Clear code inputs
            codeInputs.forEach(input => {
                input.value = '';
            });
            
            // Focus on new password field
            newPassword.focus();
        });
        
        // Resend code
        resendCodeBtn.addEventListener('click', startCountdown);
        
        // Check password strength
        newPassword.addEventListener('input', function() {
            const password = newPassword.value;
            let strength = 0;
            
            // Reset requirements
            lengthReq.querySelector('i').classList.add('hidden');
            numberReq.querySelector('i').classList.add('hidden');
            specialReq.querySelector('i').classList.add('hidden');
            
            // Check length
            if (password.length >= 8) {
                strength += 1;
                lengthReq.querySelector('i').classList.remove('hidden');
            }
            
            // Check for numbers
            if (/\d/.test(password)) {
                strength += 1;
                numberReq.querySelector('i').classList.remove('hidden');
            }
            
            // Check for special characters
            if (/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
                strength += 1;
                specialReq.querySelector('i').classList.remove('hidden');
            }
            
            // Update strength bar and text
            strengthBar.className = 'password-strength';
            
            if (password.length === 0) {
                strengthBar.classList.add('weak');
                strengthText.textContent = '';
                strengthBar.style.width = '0%';
            } else if (strength === 1) {
                strengthBar.classList.add('weak');
                strengthText.textContent = 'Weak';
            } else if (strength === 2) {
                strengthBar.classList.add('medium');
                strengthText.textContent = 'Medium';
            } else if (strength === 3) {
                if (password.length >= 12) {
                    strengthBar.classList.add('very-strong');
                    strengthText.textContent = 'Very Strong';
                } else {
                    strengthBar.classList.add('strong');
                    strengthText.textContent = 'Strong';
                }
            }
        });
        
        // Toggle password visibility
        togglePassword.addEventListener('click', function() {
            const type = newPassword.getAttribute('type') === 'password' ? 'text' : 'password';
            newPassword.setAttribute('type', type);
            togglePassword.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
        });
        
        // Reset password
        resetPasswordBtn.addEventListener('click', function() {
            const password = newPassword.value;
            const confirm = confirmPassword.value;
            
            // Validate password
            if (!password) {
                showError(passwordError, 'Password is required');
                shakeElement(newPassword);
                return;
            }
            
            if (password.length < 8) {
                showError(passwordError, 'Password must be at least 8 characters');
                shakeElement(newPassword);
                return;
            }
            
            if (!/\d/.test(password)) {
                showError(passwordError, 'Password must contain at least one number');
                shakeElement(newPassword);
                return;
            }
            
            if (!/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
                showError(passwordError, 'Password must contain at least one special character');
                shakeElement(newPassword);
                return;
            }
            
            // Check if passwords match
            if (password !== confirm) {
                showError(passwordError, 'Passwords do not match');
                shakeElement(confirmPassword);
                return;
            }
            
            // Hide error if valid
            hideError(passwordError);
            
            // Show success step
            passwordStep.classList.add('hidden');
            successStep.classList.remove('hidden');
            
            // In a real app, you would send the new password to your server here
            console.log('Password successfully reset for:', emailInput.value);
        });
        
        // Start countdown timer
        function startCountdown() {
            clearInterval(countdown);
            countdownTime = 60;
            resendCodeBtn.disabled = true;
            updateCountdown();
            
            countdown = setInterval(() => {
                countdownTime--;
                updateCountdown();
                
                if (countdownTime <= 0) {
                    clearInterval(countdown);
                    resendCodeBtn.disabled = false;
                    countdownElement.textContent = '';
                    resendCodeBtn.innerHTML = '<span>Resend code</span>';
                }
            }, 1000);
        }
        
        // Update countdown display
        function updateCountdown() {
            countdownElement.textContent = countdownTime;
        }
        
        // Show error message
        function showError(element, message) {
            element.textContent = message;
            element.classList.remove('hidden');
        }
        
        // Hide error message
        function hideError(element) {
            element.textContent = '';
            element.classList.add('hidden');
        }
        
        // Shake element animation
        function shakeElement(element) {
            element.classList.add('shake');
            setTimeout(() => {
                element.classList.remove('shake');
            }, 500);
        }
        
        // Reset modal to initial state
        function resetModal() {
            emailStep.classList.remove('hidden');
            codeStep.classList.add('hidden');
            passwordStep.classList.add('hidden');
            successStep.classList.add('hidden');
            
            emailInput.value = '';
            newPassword.value = '';
            confirmPassword.value = '';
            newPassword.setAttribute('type', 'password');
            togglePassword.innerHTML = '<i class="fas fa-eye"></i>';
            
            codeInputs.forEach(input => {
                input.value = '';
            });
            
            hideError(emailError);
            hideError(codeError);
            hideError(passwordError);
            
            clearInterval(countdown);
            resendCodeBtn.disabled = false;
            countdownElement.textContent = '';
            resendCodeBtn.innerHTML = '<span>Resend code</span>';
        }
    });
    </script>
</body>

</html>