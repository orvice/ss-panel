<?php


namespace App\Contracts\Codes;


interface Cfg
{
    const AppName = 'appName';
    const AppUri = 'appUri';
    const AppLang = 'appLang';
    const CorsHosts = 'corsHosts';
    const GoogleAnalyticsId = 'googleAnalyticsId';

    const CheckInMin = 'checkInMin';
    const CheckInMax = 'checkInMax';
    const CheckInTime = 'checkInTime';
    const DefaultTraffic = 'defaultTraffic';
    const DefaultInviteNum = 'defaultInviteNum';


    const MuKey = 'muKey';

    const HomeMessage = 'homeMessage';

    const MailgunDomain = 'mailgunDomain';
    const MailgunKey = 'mailgunKey';
    const MailgunSender = 'mailgunSender';
}