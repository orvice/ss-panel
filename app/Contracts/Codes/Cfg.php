<?php


namespace App\Contracts\Codes;


interface Cfg
{
    const AppName = 'appName';
    const CheckInMin = 'checkInMin';
    const CheckInMax = 'checkInMax';
    const CheckInTime = 'checkInTime';
    const DefaultTraffic = 'defaultTraffic';
    const DefaultInviteNum = 'defaultInviteNum';

    const AppLang = 'appLang';
    const MuKey = 'muKey';

    const HomeMessage = 'homeMessage';

    const MailgunDomain = 'mailgunDomain';
    const MailgunKey = 'mailgunKey';
    const MailgunSender = 'mailgunSender';
}