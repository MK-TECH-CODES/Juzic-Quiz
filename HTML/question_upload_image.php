<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        // Check if there's a message to display
        var message = "<?php echo isset($_SESSION['message']) ? $_SESSION['message'] : ''; ?>";
        if (message !== '') {
            // Display toast message
            showToast(message);
            // Clear the message after 3 seconds
            setTimeout(function() {
                $('.toast').toast('hide');
            }, 3000);
            <?php unset($_SESSION['message']); ?>
        }
    });

    function showToast(message) {
        // Create a toast element and append it to the toast container
        var toast = $('<div class="toast bg-success" role="alert" aria-live="assertive" aria-atomic="true">' +
            '<div class="toast-header">' +
            '<strong class="me-auto">Question Upload</strong>' +
            '<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>' +
            '</div>' +
            '<div class="toast-body text-white">' +
            '<strong>' + message + '</strong>' +
            '</div>' +
            '</div>'
        );
        $('.toast-container').append(toast);
        // Show the toast
        toast.toast('show');
    }
    </script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../CSS/image_upload.css" />
    <title>Juzic Quiz - Question Upload</title>
    <style>
    .toast-container {
        top: 2rem;
        right: 2rem;
        position: absolute;
        z-index: 9999;
    }

    .bg-success {
        background-color: #28a745 !important;
        /* Green background */
    }
    </style>
</head>

<body style="background-color: black">
    <div aria-live="polite" aria-atomic="true" class="bg-dark position-relative bd-example-toasts">
        <div class="toast-container position-absolute p-3" id="toastPlacement"></div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <button id="button1" class="btn btncolor" type="button" onclick="showContent(1)">
                    Question - Image Options
                </button>
                <button id="button2" class="btn btncolor" type="button" onclick="showContent(2)">
                    Question - Text Options
                </button>
                <button id="button3" class="btn btncolor" type="button" onclick="showContent(3)">
                    Question - True or False
                </button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div id="content1" class="col" style="min-height: 120px; display: none">
                        <div class="card card-body" style="width: auto">
                            <form action="../PHP/Questions/questions_image.php" method="post"
                                enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h3>
                                            <span class="badge" style="background-color: rebeccapurple">Question Type
                                                :</span>
                                        </h3>
                                        <br />
                                        <div class="input-group mb-3">
                                            <select class="form-select" style="border: 1px solid" name="qtype" required
                                                aria-placeholder="---SELECT---">
                                                <option selected>---SELECT---</option>
                                                <option value="easy">EASY</option>
                                                <option value="normal">NORMAL</option>
                                                <option value="hard">HARD</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <label class="form-label">
                                            <h1>
                                                <span class="badge" style="background-color: rgb(146, 50, 205)">Question
                                                    Image :</span>
                                            </h1>
                                        </label>
                                        <br />
                                        <input type="file" id="myFile" name="question" required />
                                    </div>

                                    <div class="card-body col-lg-6">
                                        <label class="form-label">
                                            <h3>
                                                <span class="badge" style="background-color: red">Option - 1 Image
                                                    :</span>
                                            </h3>
                                        </label>
                                        <br />
                                        <input type="file" id="myFile" name="option1" required />
                                    </div>
                                    <div class="card-body col-lg-6">
                                        <label class="form-label">
                                            <h3>
                                                <span class="badge" style="background-color: gold">Option - 2 Image
                                                    :</span>
                                            </h3>
                                        </label>
                                        <br />
                                        <input type="file" id="myFile" name="option2" required />
                                    </div>

                                    <div class="card-body col-lg-6">
                                        <label class="form-label">
                                            <h3>
                                                <span class="badge" style="background-color: darkgreen">Option - 3 Image
                                                    :</span>
                                            </h3>
                                        </label>
                                        <br />
                                        <input type="file" id="myFile" name="option3" required />
                                    </div>
                                    <div class="card-body col-lg-6">
                                        <label class="form-label">
                                            <h3>
                                                <span class="badge" style="background-color: darkblue">Option - 4 Image
                                                    :</span>
                                            </h3>
                                        </label>
                                        <br />
                                        <input type="file" id="myFile" name="option4" required />
                                    </div>

                                    <div class="col-8">
                                        <h1>
                                            <span class="badge" style="background-color: rgb(65, 153, 51)">Correct
                                                Option :</span>
                                        </h1>
                                        <br />
                                        <div class="input-group">
                                            <select class="form-select form-select-lg mb-3" style="border: 1px solid"
                                                name="correctoption" required>
                                                <option selected>---SELECT---</option>
                                                <option value="a">A</option>
                                                <option value="b">B</option>
                                                <option value="c">C</option>
                                                <option value="d">D</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card-body col-lg-12">
                                        <input class="btn btn-outline-primary btn-lg" type="submit"
                                            value="Save Question" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="content2" class="col" style="min-height: 120px; display: none">
                        <div class="card card-body" style="width: auto">
                            <form action="../PHP/Questions/question_text.php" method="post">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h3>
                                            <span class="badge" style="background-color: rebeccapurple">Question Type
                                                :</span>
                                        </h3>
                                        <br />
                                        <div class="input-group mb-3">
                                            <select class="form-select" style="border: 1px solid" name="qtype">
                                                <option selected>---SELECT---</option>
                                                <option value="easy">EASY</option>
                                                <option value="normal">NORMAL</option>
                                                <option value="hard">HARD</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <label class="form-label">
                                            <h1>
                                                <span class="badge" style="background-color: rgb(146, 50, 205)">Question
                                                    Text :</span>
                                            </h1>
                                        </label>
                                        <br />
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here"
                                                name="question" id="floatingTextarea2"
                                                style="height: 100px; border: 1px solid"></textarea>
                                            <label for="floatingTextarea2">Questions</label>
                                        </div>
                                    </div>
                                    <div class="card-body col-lg-6">
                                        <label class="form-label">
                                            <h3>
                                                <span class="badge" style="background-color: red">Option - 1 Text
                                                    :</span>
                                            </h3>
                                        </label>
                                        <br />
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here"
                                                name="option1" id="floatingTextarea2"
                                                style="height: 100px; border: 1px solid"></textarea>
                                            <label for="floatingTextarea2">Option - 1</label>
                                        </div>
                                    </div>
                                    <div class="card-body col-lg-6">
                                        <label class="form-label">
                                            <h3>
                                                <span class="badge" style="background-color: gold">Option - 2 Text
                                                    :</span>
                                            </h3>
                                        </label>
                                        <br />
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here"
                                                name="option2" id="floatingTextarea2"
                                                style="height: 100px; border: 1px solid"></textarea>
                                            <label for="floatingTextarea2">Option - 2</label>
                                        </div>
                                    </div>

                                    <div class="card-body col-lg-6">
                                        <label class="form-label">
                                            <h3>
                                                <span class="badge" style="background-color: darkgreen">Option - 3 Text
                                                    :</span>
                                            </h3>
                                        </label>
                                        <br />
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here"
                                                name="option3" id="floatingTextarea2"
                                                style="height: 100px; border: 1px solid"></textarea>
                                            <label for="floatingTextarea2">Option - 3</label>
                                        </div>
                                    </div>
                                    <div class="card-body col-lg-6">
                                        <label class="form-label">
                                            <h3>
                                                <span class="badge" style="background-color: darkblue">Option - 4 Text
                                                    :</span>
                                            </h3>
                                        </label>
                                        <br />
                                        <div class="form-floating">
                                            <textarea class="form-control" name="option4"
                                                placeholder="Leave a comment here" id="floatingTextarea2"
                                                style="height: 100px; border: 1px solid"></textarea>
                                            <label for="floatingTextarea2">Option - 4</label>
                                        </div>
                                    </div>

                                    <div class="col-8">
                                        <h1>
                                            <span class="badge" style="background-color: rgb(65, 153, 51)">Correct
                                                Option :</span>
                                        </h1>
                                        <br />
                                        <div class="input-group">
                                            <select class="form-select form-select-lg mb-3" style="border: 1px solid"
                                                name="correctoption" required>
                                                <option selected>---SELECT---</option>
                                                <option value="a">A</option>
                                                <option value="b">B</option>
                                                <option value="c">C</option>
                                                <option value="d">D</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card-body col-lg-12">
                                        <input class="btn btn-outline-primary btn-lg" type="submit"
                                            value="Save Question" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="content3" class="col" style="min-height: 120px; display: none">
                        <div class="card card-body" style="width: auto">
                            <form action="../PHP/Questions/question_t_or_f.php" method="post">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h3>
                                            <span class="badge" style="background-color: rebeccapurple">Question Type
                                                :</span>
                                        </h3>
                                        <br />
                                        <div class="input-group mb-3">
                                            <select class="form-select" style="border: 1px solid" name="qtype">
                                                <option selected>---SELECT---</option>
                                                <option value="easy">EASY</option>
                                                <option value="normal">NORMAL</option>
                                                <option value="hard">HARD</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <label class="form-label">
                                            <h1>
                                                <span class="badge" style="background-color: rgb(146, 50, 205)">Question
                                                    Text :</span>
                                            </h1>
                                        </label>
                                        <br />
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here"
                                                name="question" id="floatingTextarea2"
                                                style="height: 100px; border: 1px solid"></textarea>
                                            <label for="floatingTextarea2">Questions</label>
                                        </div>
                                    </div>

                                    <div class="card-body col-lg-6">
                                        <label class="form-label">
                                            <h3>
                                                <span class="badge" style="background-color: red">Option - 1 Text
                                                    :</span>
                                            </h3>
                                        </label>
                                        <br />

                                        <h1>
                                            <span class="badge bg-danger">
                                                <input type="text" name="option1" readonly
                                                    class="form-control-plaintext" style="color: white" id="staticEmail"
                                                    value="TRUE" />
                                            </span>
                                        </h1>
                                    </div>
                                    <div class="card-body col-lg-6">
                                        <label class="form-label">
                                            <h3>
                                                <span class="badge" style="background-color: darkblue">Option - 2 Text
                                                    :</span>
                                            </h3>
                                        </label>
                                        <br />
                                        <h1>
                                            <span class="badge bg-primary">
                                                <input type="text" name="option2" readonly
                                                    class="form-control-plaintext" style="color: white" id="staticEmail"
                                                    value="FALSE" />
                                            </span>
                                        </h1>
                                    </div>

                                    <div class="col-8">
                                        <h1>
                                            <span class="badge" style="background-color: rgb(65, 153, 51)">Correct
                                                Option :</span>
                                        </h1>
                                        <br />
                                        <div class="input-group">
                                            <select class="form-select form-select-lg mb-3" style="border: 1px solid"
                                                name="correctoption" required>
                                                <option selected>---SELECT---</option>
                                                <option value="a">A</option>
                                                <option value="b">B</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card-body col-lg-12">
                                        <input class="btn btn-outline-primary btn-lg" type="submit"
                                            value="Save Question" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    window.onload = function() {
        var defaultButton = document.getElementById("button1");
        defaultButton.click();
    };

    function showContent(buttonId) {
        var content1 = document.getElementById("content1");
        var content2 = document.getElementById("content2");
        var content3 = document.getElementById("content3");

        var button1 = document.getElementById("button1");
        var button2 = document.getElementById("button2");
        var button3 = document.getElementById("button3");

        if (buttonId === 1) {
            content1.style.display = "block";
            content2.style.display = "none";
            content3.style.display = "none";

            button1.classList.add("btn-pressed");
            button2.classList.remove("btn-pressed");
            button3.classList.remove("btn-pressed");
        } else if (buttonId === 2) {
            content1.style.display = "none";
            content3.style.display = "none";
            content2.style.display = "block";
            button1.classList.remove("btn-pressed");
            button3.classList.remove("btn-pressed");

            button2.classList.add("btn-pressed");
        } else if (buttonId === 3) {
            content1.style.display = "none";
            content2.style.display = "none";

            content3.style.display = "block";
            button1.classList.remove("btn-pressed");
            button2.classList.remove("btn-pressed");
            button3.classList.add("btn-pressed");
        }
    }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>