<?php


namespace App\Contracts\Codes;


interface Auth
{
    // Login Error Code
    const UserNotExist = 601;
    const UserPasswordWrong = 602;

    const CurrentPassword = 102;
    const NewPasswordRepeatWrong = 103;

    const EmptyInput = 701;

    // Register
    const InviteCodeWrong = 801;
    const EmailWrong = 802;
    const PasswordTooShort = 803;
    const EmailUsed = 804;

}