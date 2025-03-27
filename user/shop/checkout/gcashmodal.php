<?php
// Assuming necessary PHP variables like $user_firstname, $user_lastname, etc., are already set and fetched from the database
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GCash Modal</title>
    <style>
        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            text-align: center;
        }

        /* Close button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .btn1 {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
        }

        .btn1:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        .modal-header {
            color: white;
            background-color: #B31B1B;
        }

        .input-container input {
            padding: 10px;
            width: 80%;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
    </style>
</head>
<script>
    document.getElementById('proceed_to_payment_btn').addEventListener('click', function(event) {
        // Prevent the default form submission behavior
        event.preventDefault();


        $('#newModelId').modal('show');
        
    });
</script>


<script>
    document.getElementById('gcash_number').addEventListener('input', function() {
        let input = this.value;

        input = input.replace(/\D/g, '');

        input = input.slice(0, 11);

        this.value = input;
    });
</script>

<script>
    function proceedToNextModal1() {
        // Retrieve the value of the input field
        var gcashNumber = document.getElementById('gcash_number').value;

        // Check if the value meets the required conditions (not empty)
        if (gcashNumber.trim() !== '') {
            // If the input field is not empty, proceed to the next modal
            $('#newModelId').modal('hide');
            $('#newModelId1').modal('show');
        } else {
            // If the input field is empty, display an alert to the user
            alert('Please enter a GCash number.');
        }
    }
</script>

<script>
    function proceedToNextModal2() {
        // Retrieve the value of the input field
        var gcashNumber = document.getElementById('auth_code').value;

        // Check if the value meets the required conditions (not empty)
        if (gcashNumber.trim() !== '') {
            // If the input field is not empty, proceed to the next modal
            $('#newModelId1').modal('hide');
            $('#newModelId2').modal('show');
        } else {
            // If the input field is empty, display an alert to the user
            alert('Please enter the Authentication number.');
        }
    }
</script>

<script>
    function proceedToNextModal3() {
        // Retrieve the value of the input field
        var gcashNumber = document.getElementById('auth_code').value;

        // Check if the value meets the required conditions (not empty)
        if (gcashNumber.trim() !== '') {
            // If the input field is not empty, proceed to the next modal
            $('#newModelId2').modal('hide');
            $('#newModelId3').modal('show');
        } else {
            // If the input field is empty, display an alert to the user
            alert('Please enter the Authentication number.');
        }
    }
</script>

<script>
    document.getElementById('mpin').addEventListener('input', function() {
        var inputValue = this.value;
        var hiddenInput = '';

        for (var i = 0; i < inputValue.length; i++) {
            hiddenInput += '•'; // Replace each character with a black dot
        }

        this.value = hiddenInput; // Set the value of the input field to the black dots
    });
</script>


<script>
    var countdownElement = document.getElementById('countdown');

    // Set the initial time remaining
    var timeRemaining = 300;
    countdownElement.textContent = timeRemaining;

    // Start the countdown
    var countdownInterval = setInterval(function() {
        timeRemaining--;
        countdownElement.textContent = timeRemaining;

        // Check if the time has reached 0
        if (timeRemaining <= 0) {
            clearInterval(countdownInterval);
            // Optionally, you can handle the timer reaching 0 here, such as disabling the "Resend" button
        }
    }, 1000);
</script>


<script>
    // Get the "Pay" button and the green checkmark icon
    var payButton = document.getElementById("btn_booking_modal");
    var checkmarkIcon = document.getElementById("payment_success_icon");

    // Add a click event listener to the "Pay" button
    payButton.addEventListener("click", function() {
        // Toggle the visibility of the green checkmark icon
        checkmarkIcon.style.display = "inline";
    });
</script>

<!-- JavaScript to enable/disable the "Book Ticket" button -->
<script>
    // Get the "Book Ticket" button and the "Pay" button in the modal
    var bookTicketButton = document.getElementById("btn_booking");
    var payButtonModal = document.getElementById("btn_booking_modal");

    // Add a click event listener to the "Pay" button in the modal
    payButtonModal.addEventListener("click", function() {
        // Enable the "Book Ticket" button
        bookTicketButton.disabled = false;
        // Change the background color back to its original color
        bookTicketButton.style.backgroundColor = "#B31B1B";
    });
</script>

<script>
    function closeModal() {
        // Find the modal element
        var modal = document.getElementById("newModelId3");
        // Trigger the close event
        $(modal).modal('hide');
    }
</script>
<body>

<h6 class="mt-3" style="color:white;">
            Payment Method:
            <select name="payment_method" id="payment_method" style="vertical-align: middle; width: 200px;">
                <option value="gcash" style="background-image: url('img/gcash.png'); background-size: 20px 20px; background-repeat: no-repeat; padding-left: 130px;">GCash</option>
            </select>
            <button type="submit" id="proceed_to_payment_btn" name="btn_pay" style="width:70px;" class="btn btn-primary">Pay</button>
            <img src="img/green_checkmark.png" id="payment_success_icon" style="display: none; height: 30px; margin-left: 10px;">
        </h6>

        <style>
            /* Style for the container */
            .input-container {
                position: relative;
                margin-top: 10px;
            }

            /* Style for the input field */
            #gcash_number {
                border: none;
                border-bottom: 1px solid #000;
                outline: none;
                padding: 5px;
                box-sizing: border-box;
                background-color: transparent;
                text-align: center;
                /* Center align the text */
            }

            #auth_code {
                border: none;
                width: 12ch;
                /* Increase the width as needed */
                background:
                    repeating-linear-gradient(90deg,
                        dimgrey 0,
                        dimgrey 1.5ch,
                        transparent 0,
                        transparent 2ch) 0 100%/100% 2.5px no-repeat;
                color: dimgrey;
                font: 5ch consolas, monospace;
                letter-spacing: .8ch;
                /* Adjust the spacing between characters */
                text-align: center;
                margin-bottom: 10px;
                /* Adjust as needed */
            }

            #mpin::placeholder {
                font-size: 15px;
                /* Adjust the font size as needed */
                color: gray;
                /* Optional: change the color of the placeholder text */
            }

            #auth_code:focus {
                outline: none;
                color: dodgerblue;
            }

            input[type="number"]::-webkit-inner-spin-button,
            input[type="number"]::-webkit-outer-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }
        </style>

        <!-- Gcash Modal -->

        <div class="modal fade" id="newModelId" tabindex="-1" role="dialog" aria-labelledby="newModelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" style="background: linear-gradient(to bottom, #054ce1 50%, #ffffff 50%);">
                    <div class="modal-header" style="color:white;background-color:#B31B1B;">
                        <div class="row"></div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="color:#e8e9ee; max-height: 500px; overflow-y: auto;">
                        <div style="display: flex; flex-direction: column; align-items: center; margin-top: 10px;">
                            <div style="text-align: center; margin-bottom:20px;">
                                <img src="img/gcashwhite.png" alt="GCash" style="height: 50px;">
                            </div>
                            <div class="card" style="width: 400px; margin-bottom:70px; padding: 20px; background-color: #ffffff; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1);">
                                <form class="col">
                                    <div style="display: flex; align-items: center;">
                                        <label for="merchant" style="color:#5A5A5A; flex: 1;">Merchant</label>
                                        <span style="flex: 2;color: #141414;">AUB Online 2</span>
                                    </div>
                                    <div style="display: flex; align-items: center;">
                                        <label for="amount" style="color:#5A5A5A; flex: 1;">Amount Due</label>
                                        <span id="total_ticket_price1" style="flex: 2;color:#054ce1;"></span>
                                    </div>
                                    <br>
                                    <hr style="border-top: 1px solid #5A5A5A;">
                                    <div style="text-align: center; margin-top: 20px; color: black;">
                                        <strong>Login to pay with GCash</strong>
                                    </div>
                                    <br>
                                    <div class="input-container" style="text-align: center; margin-top: 20px; color: black;">
                                        <input type="text" id="gcash_number" name="gcash_number" placeholder="Enter Mobile Number" required pattern="[0-9]{11}" title="Please enter a valid 11-digit number" maxlength="11">
                                    </div>
                                </form>
                                <center><button class="btn btn-primary" style="background-color:#054ce1;" onclick="proceedToNextModal1()">Next</button></center>
                            </div>
                            <div style="margin-top: 10px; text-align: center;">
                                <span style="color: #141414;">Don't have a GCash account? </span>
                                <a href="https://m.gcash.com/gcashapp/gcash-promotion-web/2.0.0/index.html#/" style="text-decoration: underline; color: #054ce1;">Register now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gcash Modal 2 -->

        <div class="modal fade" id="newModelId1" tabindex="-1" role="dialog" aria-labelledby="newModelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" style="background: linear-gradient(to bottom, #054ce1 50%, #ffffff 50%);">
                    <div class="modal-header" style="color:white;background-color:#B31B1B;">
                        <div class="row"></div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="color:#e8e9ee; max-height: 500px; overflow-y: auto;">
                        <div style="display: flex; flex-direction: column; align-items: center; margin-top: 10px;">
                            <div style="text-align: center; margin-bottom:20px;">
                                <img src="img/gcashwhite.png" alt="GCash" style="height: 50px;">
                            </div>
                            <div class="card" style="width: 400px; margin-bottom:70px; padding: 20px; background-color: #ffffff; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1);">
                                <form class="col">
                                    <div style="text-align: center; margin-top: 20px; color: black;">
                                        <strong>Login to pay with GCash</strong>
                                        <div style="color: #5A5A5A; font-size: 12px;"><strong>Enter the 6-digit authentication code sent to your registered mobile number.</strong></div>
                                    </div>
                                    <div class="input-container" style="text-align: center; margin-top: 10px;">
                                        <input type="text" id="auth_code" name="auth_code" pattern="[0-9]{6}" title="Please enter a 6-digit number" maxlength="6" required>
                                    </div>
                                    <div id="resend_text" style="text-align: center; margin-top: 5px; color: #5A5A5A;">Didn't get the code? Resend <span id="countdown" style="text-align: center; color: #5A5A5A;">300</span>s</div>
                                </form>
                                <br>
                                <center><button class="btn btn-primary" style="background-color:#054ce1;" onclick="proceedToNextModal2()">Next</button></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Gcash Modal 3 -->

        <div class="modal fade" id="newModelId2" tabindex="-1" role="dialog" aria-labelledby="newModelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" style="background: linear-gradient(to bottom, #054ce1 50%, #ffffff 50%);">
                    <div class="modal-header" style="color:white;background-color:#B31B1B;">
                        <div class="row"></div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="color:#e8e9ee; max-height: 500px; overflow-y: auto;">
                        <div style="display: flex; flex-direction: column; align-items: center; margin-top: 10px;">
                            <div style="text-align: center; margin-bottom:20px;">
                                <img src="img/gcashwhite.png" alt="GCash" style="height: 50px;">
                            </div>
                            <div class="card" style="width: 400px; margin-bottom:70px; padding: 20px; background-color: #ffffff; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1);">
                                <form class="col">
                                    <div style="text-align: center; margin-top: 20px; color: black;">
                                        <strong>Login to pay with GCash</strong>
                                        <div style="color: #5A5A5A; font-size: 12px;"><strong>Enter your 4-digit MPIN.</strong></div>
                                    </div>
                                    <div class="input-container" style="text-align: center; margin-top: 10px;">
                                        <input type="password" id="mpin" name="mpin" pattern="[0-9]{4}" placeholder="Enter your MPIN." title="Please enter a 4-digit MPIN" maxlength="4" required
                                            style="background: transparent; border: none; outline: none; font-size: 35px; text-align: center; border-bottom: 1px solid black;">
                                    </div>
                                </form>
                                <br>
                                <center><button class="btn btn-primary" style="background-color:#054ce1;" onclick="proceedToNextModal3()">Next</button></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gcash Modal 4-->


        <div class="modal fade" id="newModelId3" tabindex="-1" role="dialog" aria-labelledby="newModelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" style="background: linear-gradient(to bottom, #054ce1 50%, #ffffff 50%);">
                    <div class="modal-header" style="color:white;background-color:#B31B1B;">
                        <div class="row"></div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="color:#e8e9ee; max-height: 500px; overflow-y: auto;">
                        <div style="display: flex; flex-direction: column; align-items: center; margin-top: 10px;">
                            <div style="text-align: center; margin-bottom:20px;">
                                <img src="img/gcashwhite.png" alt="GCash" style="height: 50px;">
                            </div>
                            <div class="card" style="width: 400px; margin-bottom:70px; padding: 20px; background-color: #ffffff; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1);">
                                <form class="col">
                                    <div style="display: flex; align-items: center; text-align: center;">
                                        <label style="color:#00008B; flex: 1;"><strong>AUB Online 2</strong></label>
                                    </div>
                                    <br>
                                    <div style="display: flex; align-items: center;">
                                        <label style="color:#5A5A5A; font-size: 15px; flex: 1;"><strong>PAY WITH</strong></label>
                                    </div>
                                    <div style="display: flex; align-items: center;">
                                        <label for="merchant" style="color:#5A5A5A; flex: 1;">GCash</label>
                                        <span>---</span>
                                        <input type="radio" style="color:#054ce1; background-color:#054ce1;" name="payment_method" style="margin-left: 10px;" checked>
                                    </div>
                                    <br>
                                    <div style="display: flex; align-items: center;">
                                        <label style="color:#5A5A5A; font-size: 15px; flex: 1;"><strong>YOU ARE ABOUT TO PAY</strong></label>
                                        <span style="flex: 2; color: #141414; font-weight: bold;">₱<?php echo number_format($product_price, 2); ?></span>
                                    </div>
                                    
                                    <div style="display: flex; align-items: center;">
                                        <label for="merchant" style="color:#5A5A5A; flex: 1;">Amount</label>
                                        <span id="total_ticket_price2" style="flex: 2; color: #141414;">₱<?php echo number_format($product_price, 2); ?></span>
                                    </div>
                                    <div style="display: flex; align-items: center;">
                                        <label for="merchant" style="color:#5A5A5A; flex: 1;">Discount</label>
                                        <span style="flex: 2; color: #5A5A5A;">No available voucher</span>
                                    </div>
                                    <br>
                                    <hr style="border-top: 1px solid #5A5A5A;">
                                    <div style="display: flex; align-items: center;">
                                        <label style="color:#5A5A5A; font-size: 15px; flex: 1;"><strong>Total</strong></label>
                                        <span id="total_ticket_price3" style="flex: 2; color: #141414; font-size: 25px; font-weight: bold;"></span>
                                    </div>
                                    <br><br>
                                    <div style="display: flex; align-items: center; text-align: center;">
                                        <label style="color:#5A5A5A; font-size: 12px; flex: 1;"><strong>Please review to ensure that the details are correct before you proceed.</strong></label>
                                    </div>
                                </form>
                                <center>
                                    <button id="btn_booking_modal" class="btn btn-primary" style="background-color:#054ce1;" onclick="completePayment()">PAY <span id="total_ticket_price4"></span></button>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>
