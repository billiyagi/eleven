<?php


function setFlashMessage($message, $type = 'success')
{
    $_SESSION['flash_message'] = [
        'message' => $message,
        'type' => $type
    ];
}

function getFlashMessage()
{

    if (isset($_SESSION['flash_message'])) {
        echo "
            <script>
                Swal.fire({
                    icon: '" . $_SESSION['flash_message']['type'] . "',
                    title: '" . $_SESSION['flash_message']['message'] . "'
                    })
            </script>
        ";
        unset($_SESSION['flash_message']);
    }
}

function setFlashValidation($validation)
{
    $_SESSION['flash_validation'] = $validation;
}

function getFlashValidation($key)
{
    if (isset($_SESSION['flash_validation'])) {
        $flashValidation = $_SESSION['flash_validation'];
        // unset($_SESSION['flash_validation']);
        if (!empty($flashValidation[$key])) {
            return '<small class="text-danger">' . $flashValidation[$key] . '</small>';
        }
    }
}

function destroyFlashValidation()
{
    unset($_SESSION['flash_validation']);
}
