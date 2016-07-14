<?php

//Thanks to http://blog.csdn.net/jollyjumper/article/details/9823047

namespace App\Controllers;


use App\Models\Link;
use App\Models\User;
use App\Models\Node;
use App\Models\Smartline;
use App\Utils\Tools;
use App\Services\Config;


/**
 *  HomeController
 */
class LinkController extends BaseController
{
    public function __construct()
    {
        
    }

    public static function GenerateCode($type,$address,$port,$ios,$userid)
    {
        $Elink = Link::where("type","=",$type)->where("address","=",$address)->where("port","=",$port)->where("ios","=",$ios)->where("userid","=",$userid)->first();
		if($Elink != null)
		{
			return $Elink->token;
		}
		$NLink = new Link();
		$NLink->type = $type;
		$NLink->address = $address;
		$NLink->port = $port;
		$NLink->ios = $ios;
		$NLink->userid = $userid;
		$NLink->token = Tools::genRandomChar(8);
		$NLink->save();
		
		return $NLink->token;
    }
	
	
	
	
	public static function GenerateSurgeCode($address,$port,$userid,$geo,$method)
    {
        $Elink = Link::where("type","=",0)->where("address","=",$address)->where("port","=",$port)->where("userid","=",$userid)->where("geo","=",$geo)->where("method","=",$method)->first();
		if($Elink != null)
		{
			return $Elink->token;
		}
		$NLink = new Link();
		$NLink->type = 0;
		$NLink->address = $address;
		$NLink->port = $port;
		$NLink->ios = 1;
		$NLink->geo = $geo;
		$NLink->method = $method;
		$NLink->userid = $userid;
		$NLink->token = Tools::genRandomChar(8);
		$NLink->save();
		
		return $NLink->token;
    }
	
	public static function GenerateIosCode($address,$port,$userid,$geo,$method)
    {
        $Elink = Link::where("type","=",-1)->where("address","=",$address)->where("port","=",$port)->where("userid","=",$userid)->where("geo","=",$geo)->where("method","=",$method)->first();
		if($Elink != null)
		{
			return $Elink->token;
		}
		$NLink = new Link();
		$NLink->type = -1;
		$NLink->address = $address;
		$NLink->port = $port;
		$NLink->ios = 1;
		$NLink->geo = $geo;
		$NLink->method = $method;
		$NLink->userid = $userid;
		$NLink->token = Tools::genRandomChar(8);
		$NLink->save();
		
		return $NLink->token;
    }
	
	public static function GetContent($request, $response, $args){
        $token = $args['token'];
        
        //$builder->getPhrase();
		$Elink = Link::where("token","=",$token)->first();
		if($Elink == null)
		{
			return null;
		}
		
		switch($Elink->type)
		{
			case -1:
				$user=User::where("id",$Elink->userid)->first();
				if($user == null)
				{
					return null;
				}
				$newResponse = $response->withHeader('Content-type', ' application/octet-stream')->withHeader('Content-Disposition', ' attachment; filename=allinone.conf');//->getBody()->write($builder->output());
				$newResponse->getBody()->write(LinkController::GetIosConf(Node::where('sort', 0)->where("type","1")->where(
					function ($query) use ($user) {
						$query->where("node_group","=",$user->node_group)
							->orWhere("node_group","=",0);
					}
				)->where("node_class","<=",$user->class)->get(),$user));
				return $newResponse;
			case 3:
				$type = "PROXY";
				break;
			case 7:
				$type = "PROXY";
				break;
			case 6:
				$newResponse = $response->withHeader('Content-type', ' application/octet-stream')->withHeader('Content-Disposition', ' attachment; filename='.$token.'.mobileconfig');//->getBody()->write($builder->output());
				$newResponse->getBody()->write(LinkController::GetApn($Elink->isp,$Elink->address,$Elink->port,User::where("id","=",$Elink->userid)->first()->pac));
				return $newResponse;
			case 0:
				if($Elink->geo==0)
				{
					$newResponse = $response->withHeader('Content-type', ' application/octet-stream')->withHeader('Content-Disposition', ' attachment; filename='.$token.'.conf');//->getBody()->write($builder->output());
					$newResponse->getBody()->write(LinkController::GetSurge(User::where("id","=",$Elink->userid)->first()->passwd,$Elink->method,$Elink->address,$Elink->port,User::where("id","=",$Elink->userid)->first()->pac));
					return $newResponse;
				}
				else
				{
					$newResponse = $response->withHeader('Content-type', ' application/octet-stream')->withHeader('Content-Disposition', ' attachment; filename='.$token.'.conf');//->getBody()->write($builder->output());
					$newResponse->getBody()->write(LinkController::GetSurgeGeo(User::where("id","=",$Elink->userid)->first()->passwd,$Elink->method,$Elink->address,$Elink->port));
					return $newResponse;
				}
			case 8:
				if($Elink->ios==0)
				{
					$type = "SOCKS5";
				}
				else
				{
					$type = "SOCKS";
				}
				break;
			default:
				break;
		}
        $newResponse = $response->withHeader('Content-type', ' application/x-ns-proxy-autoconfig');//->getBody()->write($builder->output());
        $newResponse->getBody()->write(LinkController::GetPac($type,$Elink->address,$Elink->port,User::where("id","=",$Elink->userid)->first()->pac));
        return $newResponse;
    }
	
	
	public static function GetGfwlistJs($request, $response, $args){
        $newResponse = $response->withHeader('Content-type', ' application/x-ns-proxy-autoconfig')->withHeader('Content-Disposition', ' attachment; filename=gfwlist.js');;//->getBody()->write($builder->output());
        $newResponse->getBody()->write(LinkController::GetMacPac());
        return $newResponse;
	}
	
	public static function GetPcConf($nodes,$user){
		$string='
{
	"index" : 4,
	"random" : false,
	"global" : false,
	"enabled" : true,
	"shareOverLan" : false,
	"isDefault" : false,
	"localPort" : 1080,
	"pacUrl" : null,
	"useOnlinePac" : false,
	"reconnectTimes" : 3,
	"randomAlgorithm" : 0,
	"TTL" : 0,
	"proxyEnable" : false,
	"proxyType" : 0,
	"proxyHost" : null,
	"proxyPort" : 0,
	"proxyAuthUser" : null,
	"proxyAuthPass" : null,
	"authUser" : null,
	"authPass" : null,
	"autoban" : false
}
		';
		
		
		$json=json_decode($string,TRUE);
		$temparray=array();
		foreach($nodes as $node)
		{
			array_push($temparray,array("remarks"=>$node->name,
										"server"=>$node->server,
										"server_port"=>$user->port,
										"method"=>($node->custom_method==1?$user->method:$node->method),
										"obfs"=>((Config::get('enable_rss')=='true'&&$node->custom_rss==1&&!($user->obfs=='plain'&&$user->protocol=='origin'))?$user->obfs:"plain"),
										"obfsparam"=>((Config::get('enable_rss')=='true'&&$node->custom_rss==1&&!($user->obfs=='plain'&&$user->protocol=='origin'))?$user->obfs_param:""),
										"remarks_base64"=>base64_encode($node->name),
										"password"=>$user->passwd,
										"tcp_over_udp"=>false,
										"udp_over_tcp"=>false,
										"protocol"=>((Config::get('enable_rss')=='true'&&$node->custom_rss==1&&!($user->obfs=='plain'&&$user->protocol=='origin'))?$user->protocol:"origin"),
										"obfs_udp"=>false,
										"enable"=>true));
		}
		$json["configs"]=$temparray;
        return json_encode($json);
    }
	
	
	public static function GetIosConf($nodes,$user){
		$proxy_name="";
		$proxy_group="";
		foreach($nodes as $node)
		{
			$proxy_group.=$node->name.' = custom,'.$node->server.','.$user->port.','.($node->custom_method==1?$user->method:$node->method).','.$user->passwd.','.Config::get('baseUrl').'/downloads/SSEncrypt.module'."\n";
			$proxy_name.=",".$node->name;
		}
		
		
		return '
[General]

skip-proxy = 192.168.0.0/16, 10.0.0.0/8, 172.16.0.0/12, localhost, *.local

bypass-tun = 192.168.0.0/16, 10.0.0.0/8, 172.16.0.0/12

dns-server = 119.29.29.29, 223.5.5.5, 114.114.114.114
loglevel = notify



[Proxy]
DIRECT = direct
'.$proxy_group.'

[Proxy Group]
Proxy = select,DIRECT'.$proxy_name.'


[Rule]

DOMAIN-KEYWORD,adsmogo,REJECT

DOMAIN-SUFFIX,acs86.com,REJECT

DOMAIN-SUFFIX,adcome.cn,REJECT

DOMAIN-SUFFIX,adinfuse.com,REJECT

DOMAIN-SUFFIX,admaster.com.cn,REJECT

DOMAIN-SUFFIX,admob.com,REJECT

DOMAIN-SUFFIX,adsage.cn,REJECT

DOMAIN-SUFFIX,adsage.com,REJECT

DOMAIN-SUFFIX,adsmogo.org,REJECT

DOMAIN-SUFFIX,ads.mobclix.com,REJECT

DOMAIN-SUFFIX,adview.cn,REJECT

DOMAIN-SUFFIX,adwhirl.com,REJECT

DOMAIN-SUFFIX,adwo.com,REJECT

DOMAIN-SUFFIX,appads.com,REJECT

DOMAIN-SUFFIX,domob.cn,REJECT

DOMAIN-SUFFIX,domob.com.cn,REJECT

DOMAIN-SUFFIX,domob.org,REJECT

DOMAIN-SUFFIX,doubleclick.net,REJECT

DOMAIN-SUFFIX,duomeng.cn,REJECT

DOMAIN-SUFFIX,duomeng.net,REJECT

DOMAIN-SUFFIX,duomeng.org,REJECT

DOMAIN-SUFFIX,googeadsserving.cn,REJECT

DOMAIN-SUFFIX,guomob.com,REJECT

DOMAIN-SUFFIX,immob.cn,REJECT

DOMAIN-SUFFIX,inmobi.com,REJECT

DOMAIN-SUFFIX,mobads.baidu.com,REJECT

DOMAIN-SUFFIX,mobads-logs.baidu.com,REJECT

DOMAIN-SUFFIX,smartadserver.com,REJECT

DOMAIN-SUFFIX,tapjoyads.com,REJECT

DOMAIN-SUFFIX,umeng.co,REJECT

DOMAIN-SUFFIX,umeng.com,REJECT

DOMAIN-SUFFIX,umtrack.com,REJECT

DOMAIN-SUFFIX,uyunad.com,REJECT

DOMAIN-SUFFIX,youmi.net,REJECT

GEOIP,AD,Proxy
GEOIP,AE,Proxy
GEOIP,AF,Proxy
GEOIP,AG,Proxy
GEOIP,AI,Proxy
GEOIP,AL,Proxy
GEOIP,AM,Proxy
GEOIP,AO,Proxy
GEOIP,AQ,Proxy
GEOIP,AR,Proxy
GEOIP,AS,Proxy
GEOIP,AS,Proxy
GEOIP,AS,Proxy
GEOIP,AS,Proxy
GEOIP,AT,Proxy
GEOIP,AU,Proxy
GEOIP,AW,Proxy
GEOIP,AX,Proxy
GEOIP,AZ,Proxy
GEOIP,BA,Proxy
GEOIP,BD,Proxy
GEOIP,BE,Proxy
GEOIP,BF,Proxy
GEOIP,BG,Proxy
GEOIP,BH,Proxy
GEOIP,BI,Proxy
GEOIP,BJ,Proxy
GEOIP,BL,Proxy
GEOIP,BM,Proxy
GEOIP,BN,Proxy
GEOIP,BO,Proxy
GEOIP,BQ,Proxy
GEOIP,BR,Proxy
GEOIP,BS,Proxy
GEOIP,BT,Proxy
GEOIP,BW,Proxy
GEOIP,BY,Proxy
GEOIP,BZ,Proxy
GEOIP,CA,Proxy
GEOIP,CC,Proxy
GEOIP,CD,Proxy
GEOIP,CF,Proxy
GEOIP,CG,Proxy
GEOIP,CH,Proxy
GEOIP,CI,Proxy
GEOIP,CK,Proxy
GEOIP,CL,Proxy
GEOIP,CM,Proxy
GEOIP,CO,Proxy
GEOIP,CR,Proxy
GEOIP,CU,Proxy
GEOIP,CV,Proxy
GEOIP,CW,Proxy
GEOIP,CX,Proxy
GEOIP,CY,Proxy
GEOIP,CZ,Proxy
GEOIP,DE,Proxy
GEOIP,DJ,Proxy
GEOIP,DK,Proxy
GEOIP,DM,Proxy
GEOIP,DO,Proxy
GEOIP,DZ,Proxy
GEOIP,EC,Proxy
GEOIP,EE,Proxy
GEOIP,EG,Proxy
GEOIP,EG,Proxy
GEOIP,EH,Proxy
GEOIP,ER,Proxy
GEOIP,ES,Proxy
GEOIP,ET,Proxy
GEOIP,FI,Proxy
GEOIP,FJ,Proxy
GEOIP,FK,Proxy
GEOIP,FM,Proxy
GEOIP,FO,Proxy
GEOIP,FR,Proxy
GEOIP,GA,Proxy
GEOIP,GB,Proxy
GEOIP,GD,Proxy
GEOIP,GE,Proxy
GEOIP,GF,Proxy
GEOIP,GG,Proxy
GEOIP,GH,Proxy
GEOIP,GI,Proxy
GEOIP,GL,Proxy
GEOIP,GM,Proxy
GEOIP,GN,Proxy
GEOIP,GP,Proxy
GEOIP,GQ,Proxy
GEOIP,GR,Proxy
GEOIP,GS,Proxy
GEOIP,GT,Proxy
GEOIP,GU,Proxy
GEOIP,GW,Proxy
GEOIP,GY,Proxy
GEOIP,HK,Proxy
GEOIP,HM,Proxy
GEOIP,HN,Proxy
GEOIP,HR,Proxy
GEOIP,HT,Proxy
GEOIP,HU,Proxy
GEOIP,ID,Proxy
GEOIP,IE,Proxy
GEOIP,IL,Proxy
GEOIP,IM,Proxy
GEOIP,IN,Proxy
GEOIP,IO,Proxy
GEOIP,IQ,Proxy
GEOIP,IR,Proxy
GEOIP,IS,Proxy
GEOIP,IT,Proxy
GEOIP,JE,Proxy
GEOIP,JM,Proxy
GEOIP,JO,Proxy
GEOIP,JP,Proxy
GEOIP,KE,Proxy
GEOIP,KG,Proxy
GEOIP,KH,Proxy
GEOIP,KI,Proxy
GEOIP,KM,Proxy
GEOIP,KN,Proxy
GEOIP,KP,Proxy
GEOIP,KR,Proxy
GEOIP,KW,Proxy
GEOIP,KY,Proxy
GEOIP,KZ,Proxy
GEOIP,LA,Proxy
GEOIP,LB,Proxy
GEOIP,LC,Proxy
GEOIP,LI,Proxy
GEOIP,LK,Proxy
GEOIP,LR,Proxy
GEOIP,LS,Proxy
GEOIP,LT,Proxy
GEOIP,LU,Proxy
GEOIP,LV,Proxy
GEOIP,LY,Proxy
GEOIP,MA,Proxy
GEOIP,MC,Proxy
GEOIP,MD,Proxy
GEOIP,ME,Proxy
GEOIP,MF,Proxy
GEOIP,MG,Proxy
GEOIP,MH,Proxy
GEOIP,MK,Proxy
GEOIP,ML,Proxy
GEOIP,MM,Proxy
GEOIP,MN,Proxy
GEOIP,MO,Proxy
GEOIP,MP,Proxy
GEOIP,MQ,Proxy
GEOIP,MR,Proxy
GEOIP,MS,Proxy
GEOIP,MT,Proxy
GEOIP,MU,Proxy
GEOIP,MV,Proxy
GEOIP,MW,Proxy
GEOIP,MX,Proxy
GEOIP,MY,Proxy
GEOIP,MZ,Proxy
GEOIP,NA,Proxy
GEOIP,NC,Proxy
GEOIP,NE,Proxy
GEOIP,NF,Proxy
GEOIP,NG,Proxy
GEOIP,NI,Proxy
GEOIP,NL,Proxy
GEOIP,NO,Proxy
GEOIP,NP,Proxy
GEOIP,NR,Proxy
GEOIP,NU,Proxy
GEOIP,NZ,Proxy
GEOIP,OM,Proxy
GEOIP,PA,Proxy
GEOIP,PE,Proxy
GEOIP,PF,Proxy
GEOIP,PG,Proxy
GEOIP,PH,Proxy
GEOIP,PK,Proxy
GEOIP,PL,Proxy
GEOIP,PM,Proxy
GEOIP,PN,Proxy
GEOIP,PR,Proxy
GEOIP,PS,Proxy
GEOIP,PT,Proxy
GEOIP,PW,Proxy
GEOIP,PY,Proxy
GEOIP,QA,Proxy
GEOIP,RE,Proxy
GEOIP,RO,Proxy
GEOIP,RS,Proxy
GEOIP,RU,Proxy
GEOIP,RW,Proxy
GEOIP,SA,Proxy
GEOIP,SB,Proxy
GEOIP,SC,Proxy
GEOIP,SD,Proxy
GEOIP,SE,Proxy
GEOIP,SG,Proxy
GEOIP,SH,Proxy
GEOIP,SI,Proxy
GEOIP,SJ,Proxy
GEOIP,SK,Proxy
GEOIP,SL,Proxy
GEOIP,SM,Proxy
GEOIP,SN,Proxy
GEOIP,SO,Proxy
GEOIP,SR,Proxy
GEOIP,SS,Proxy
GEOIP,ST,Proxy
GEOIP,SV,Proxy
GEOIP,SX,Proxy
GEOIP,SY,Proxy
GEOIP,SZ,Proxy
GEOIP,TC,Proxy
GEOIP,TD,Proxy
GEOIP,TF,Proxy
GEOIP,TG,Proxy
GEOIP,TH,Proxy
GEOIP,TJ,Proxy
GEOIP,TK,Proxy
GEOIP,TL,Proxy
GEOIP,TM,Proxy
GEOIP,TN,Proxy
GEOIP,TO,Proxy
GEOIP,TR,Proxy
GEOIP,TT,Proxy
GEOIP,TV,Proxy
GEOIP,TW,Proxy
GEOIP,TZ,Proxy
GEOIP,UA,Proxy
GEOIP,UG,Proxy
GEOIP,UM,Proxy
GEOIP,US,Proxy
GEOIP,UY,Proxy
GEOIP,UZ,Proxy
GEOIP,VA,Proxy
GEOIP,VC,Proxy
GEOIP,VE,Proxy
GEOIP,VG,Proxy
GEOIP,VI,Proxy
GEOIP,VN,Proxy
GEOIP,VU,Proxy
GEOIP,WF,Proxy
GEOIP,WS,Proxy
GEOIP,YE,Proxy
GEOIP,YT,Proxy
GEOIP,ZA,Proxy
GEOIP,ZM,Proxy
GEOIP,ZW,Proxy
IP-CIDR,91.108.4.0/22,Proxy,no-resolve

IP-CIDR,91.108.56.0/22,Proxy,no-resolve

IP-CIDR,109.239.140.0/24,Proxy,no-resolve

IP-CIDR,149.154.160.0/20,Proxy,no-resolve

IP-CIDR,10.0.0.0/8,DIRECT

IP-CIDR,127.0.0.0/8,DIRECT

IP-CIDR,172.16.0.0/12,DIRECT

IP-CIDR,192.168.0.0/16,DIRECT

GEOIP,CN,DIRECT

FINAL,Proxy';
		
    }
	
	private static function GetSurge($passwd,$method,$server,$port,$defined)
	{
		$rulelist = base64_decode(file_get_contents("https://raw.githubusercontent.com/gfwlist/gfwlist/master/gfwlist.txt"))."\n".$defined;  
		$gfwlist = explode("\n", $rulelist);  
	  
		$count = 0;  
		$pac_content = '';   
		$find_function_content = '
[General]
skip-proxy = 192.168.0.0/16, 10.0.0.0/8, 172.16.0.0/12, localhost, *.local
bypass-tun = 192.168.0.0/16, 10.0.0.0/8, 172.16.0.0/12
dns-server = 119.29.29.29, 223.5.5.5, 114.114.114.114
loglevel = notify

[Proxy]
Proxy = custom,'.$server.','.$port.','.$method.','.$passwd.','.Config::get('baseUrl').'/downloads/SSEncrypt.module

[Rule]
DOMAIN-KEYWORD,adsmogo,REJECT
DOMAIN-SUFFIX,acs86.com,REJECT
DOMAIN-SUFFIX,adcome.cn,REJECT
DOMAIN-SUFFIX,adinfuse.com,REJECT
DOMAIN-SUFFIX,admaster.com.cn,REJECT
DOMAIN-SUFFIX,admob.com,REJECT
DOMAIN-SUFFIX,adsage.cn,REJECT
DOMAIN-SUFFIX,adsage.com,REJECT
DOMAIN-SUFFIX,adsmogo.org,REJECT
DOMAIN-SUFFIX,ads.mobclix.com,REJECT
DOMAIN-SUFFIX,adview.cn,REJECT
DOMAIN-SUFFIX,adwhirl.com,REJECT
DOMAIN-SUFFIX,adwo.com,REJECT
DOMAIN-SUFFIX,appads.com,REJECT
DOMAIN-SUFFIX,domob.cn,REJECT
DOMAIN-SUFFIX,domob.com.cn,REJECT
DOMAIN-SUFFIX,domob.org,REJECT
DOMAIN-SUFFIX,doubleclick.net,REJECT
DOMAIN-SUFFIX,duomeng.cn,REJECT
DOMAIN-SUFFIX,duomeng.net,REJECT
DOMAIN-SUFFIX,duomeng.org,REJECT
DOMAIN-SUFFIX,googeadsserving.cn,REJECT
DOMAIN-SUFFIX,guomob.com,REJECT
DOMAIN-SUFFIX,immob.cn,REJECT
DOMAIN-SUFFIX,inmobi.com,REJECT
DOMAIN-SUFFIX,mobads.baidu.com,REJECT
DOMAIN-SUFFIX,mobads-logs.baidu.com,REJECT
DOMAIN-SUFFIX,smartadserver.com,REJECT
DOMAIN-SUFFIX,tapjoyads.com,REJECT
DOMAIN-SUFFIX,umeng.co,REJECT
DOMAIN-SUFFIX,umeng.com,REJECT
DOMAIN-SUFFIX,umtrack.com,REJECT
DOMAIN-SUFFIX,uyunad.com,REJECT
DOMAIN-SUFFIX,youmi.net,REJECT'."\n";  
$isget=array();
		foreach($gfwlist as $index=>$rule) {  
			if (empty($rule))  
				continue;  
			else if (substr($rule, 0, 1) == '!' || substr($rule, 0, 1) == '[')  
				continue;  
			
			if (substr($rule, 0, 2) == '@@') {  
			  	// ||开头表示前面还有路径  
				if (substr($rule, 2, 2) =='||') {  
					//$rule_reg = preg_match("/^((http|https):\/\/)?([^\/]+)/i",substr($rule, 2), $matches);  
					$host = substr($rule, 4);
					//preg_match("/[^\.\/]+\.[^\.\/]+$/", $host, $matches);
					if(isset($isget[$host]))
					{
						continue;
					}
					$isget[$host]=1;
					$find_function_content.="DOMAIN,".$host.",DIRECT,force-remote-dns\n";
					continue;					
				// !开头相当于正则表达式^  
				} else if (substr($rule, 2, 1) == '|') {  
					preg_match("/(\d{1,3}\.){3}\d{1,3}/",substr($rule, 3), $matches); 
					if(!isset($matches[0]))
					{
						continue;
					}
					
					$host = $matches[0];
					if($host != "")
					{
						if(isset($isget[$host]))
						{
							continue;
						}
						$isget[$host]=1;
						$find_function_content.="IP-CIDR,".$host."/32,DIRECT,no-resolve \n";  
						continue;
					}
					else
					{
						preg_match_all("~^(([^:/?#]+):)?(//([^/?#]*))?([^?#]*)(\?([^#]*))?(#(.*))?~i",substr($rule,3), $matches);  
						
						if(!isset($matches[4][0]))
						{
							continue;
						}
						
						$host = $matches[4][0];
						if($host != "")
						{
							if(isset($isget[$host]))
							{
								continue;
							}
							$isget[$host]=1;
							$find_function_content.="DOMAIN-SUFFIX,".$host.",DIRECT,force-remote-dns\n";  
							continue;
						}
					}
				} else if (substr($rule, 2, 1) == '.') {
					$host = substr($rule, 3);
					if($host != "")
					{
						if(isset($isget[$host]))
						{
							continue;
						}
						$isget[$host]=1;
						$find_function_content.="DOMAIN-SUFFIX,".$host.",DIRECT,force-remote-dns \n";  
						continue;
					}
				}
			} 
			
			// ||开头表示前面还有路径  
			if (substr($rule, 0, 2) =='||') {  
				//$rule_reg = preg_match("/^((http|https):\/\/)?([^\/]+)/i",substr($rule, 2), $matches);  
				$host = substr($rule, 2);
				//preg_match("/[^\.\/]+\.[^\.\/]+$/", $host, $matches);
				
				if(strpos($host,"*")!==FALSE)
				{
					$host = substr($host,strpos($host,"*")+1);
					if(strpos($host,".")!==FALSE)
					{
						$host = substr($host,strpos($host,".")+1);
					}
					if(isset($isget[$host]))
					{
						continue;
					}
					$isget[$host]=1;
					$find_function_content.="DOMAIN-KEYWORD,".$host.",Proxy,force-remote-dns\n";  
					continue;
				}
					
				if(isset($isget[$host]))
				{
					continue;
				}
				$isget[$host]=1;
				$find_function_content.="DOMAIN,".$host.",Proxy,force-remote-dns\n";  
			// !开头相当于正则表达式^  
			} else if (substr($rule, 0, 1) == '|') {  
				preg_match("/(\d{1,3}\.){3}\d{1,3}/",substr($rule, 1), $matches);  
				
				if(!isset($matches[0]))
				{
					continue;
				}
				
				$host = $matches[0];
				if($host != "")
				{
					if(isset($isget[$host]))
					{
						continue;
					}
					$isget[$host]=1;
					$find_function_content.="IP-CIDR,".$host."/32,Proxy,no-resolve \n";  
					continue;
				}
				else
				{
					preg_match_all("~^(([^:/?#]+):)?(//([^/?#]*))?([^?#]*)(\?([^#]*))?(#(.*))?~i",substr($rule,1), $matches);  
					
					if(!isset($matches[4][0]))
					{
						continue;
					}
					
					$host = $matches[4][0];
					if(strpos($host,"*")!==FALSE)
					{
						$host = substr($host,strpos($host,"*")+1);
						if(strpos($host,".")!==FALSE)
						{
							$host = substr($host,strpos($host,".")+1);
						}
						if(isset($isget[$host]))
						{
							continue;
						}
						$isget[$host]=1;
						$find_function_content.="DOMAIN-KEYWORD,".$host.",Proxy,force-remote-dns\n";  
						continue;
					}
					
					if($host != "")
					{
						if(isset($isget[$host]))
						{
							continue;
						}
						$isget[$host]=1;
						$find_function_content.="DOMAIN-SUFFIX,".$host.",Proxy,force-remote-dns\n";  
						continue;
					}
				}
			} else {
				$host = substr($rule, 0);
				if(strpos($host,"/")!==FALSE)
				{
					$host = substr($host,0,strpos($host,"/"));
				}
				
				if($host != "")
				{
					if(isset($isget[$host]))
					{
						continue;
					}
					$isget[$host]=1;
					$find_function_content.="DOMAIN-KEYWORD,".$host.",PROXY,force-remote-dns \n";  
					continue;
				}
			}
			
			
			$count = $count + 1;  
	  }  
	  $find_function_content.='
DOMAIN-KEYWORD,google,Proxy,force-remote-dns
IP-CIDR,91.108.4.0/22,Proxy,no-resolve
IP-CIDR,91.108.56.0/22,Proxy,no-resolve
IP-CIDR,109.239.140.0/24,Proxy,no-resolve
IP-CIDR,149.154.160.0/20,Proxy,no-resolve
IP-CIDR,10.0.0.0/8,DIRECT
IP-CIDR,127.0.0.0/8,DIRECT
IP-CIDR,172.16.0.0/12,DIRECT
IP-CIDR,192.168.0.0/16,DIRECT
GEOIP,CN,DIRECT
FINAL,DIRECT
	  ';  
	  $pac_content.=$find_function_content;   
	  return $pac_content;  
	}
		
	
	private static function GetPac($type,$address,$port,$defined)
	{
		
		header('Content-type: application/x-ns-proxy-autoconfig');
		return LinkController::get_pac($type,$address,$port,true,$defined);

	}
	
	private static function GetMacPac()
	{
		
		header('Content-type: application/x-ns-proxy-autoconfig');
		return LinkController::get_mac_pac();

	}
	
	
	
	/** 
	 * This is a php implementation of autoproxy2pac 
	 */  
	private static function reg_encode($str) {  
	  $tmp_str = $str;  
	  $tmp_str = str_replace('/', "\\/", $tmp_str);  
	  $tmp_str = str_replace('.', "\\.", $tmp_str);  
	  $tmp_str = str_replace(':', "\\:", $tmp_str);  
	  $tmp_str = str_replace('%', "\\%", $tmp_str);  
	  $tmp_str = str_replace('*', ".*", $tmp_str);  
	  $tmp_str = str_replace('-', "\\-", $tmp_str);  
	  $tmp_str = str_replace('&', "\\&", $tmp_str);  
	  $tmp_str = str_replace('?', "\\?", $tmp_str);  
	  $tmp_str = str_replace('+', "\\+", $tmp_str);  
	  
	  return $tmp_str;  
	}  
	  
	private static function get_pac($proxy_type, $proxy_host, $proxy_port, $proxy_google,$defined) {  
	  $rulelist = base64_decode(file_get_contents("https://raw.githubusercontent.com/gfwlist/gfwlist/master/gfwlist.txt"))."\n".$defined;  
	  $gfwlist = explode("\n", $rulelist);  
	  if ($proxy_google == "true") {  
		$gfwlist[] = ".google.com";  
	  }  
	  
	  $count = 0;  
	  $pac_content = '';   
	  $find_function_content = 'function FindProxyForURL(url, host) { var PROXY = "'.$proxy_type.' '.$proxy_host.':'.$proxy_port.'; DIRECT"; var DEFAULT = "DIRECT";'."\n";  
	  foreach($gfwlist as $index=>$rule) {  
		if (empty($rule))  
		  continue;  
		else if (substr($rule, 0, 1) == '!' || substr($rule, 0, 1) == '[')  
		  continue;  
		$return_proxy = 'PROXY';  
		// @@开头表示默认是直接访问  
		if (substr($rule, 0, 2) == '@@') {  
		  $rule = substr($rule, 2);  
		  $return_proxy = "DEFAULT";  
		}  
	  
		// ||开头表示前面还有路径  
		if (substr($rule, 0, 2) =='||') {  
		  $rule_reg = "^[\\w\\-]+:\\/+(?!\\/)(?:[^\\/]+\\.)?".LinkController::reg_encode(substr($rule, 2));  
		// !开头相当于正则表达式^  
		} else if (substr($rule, 0, 1) == '|') {  
		  $rule_reg = "^" . LinkController::reg_encode(substr($rule, 1));  
		// 前后匹配的/表示精确匹配  
		} else if (substr($rule, 0, 1) == '/' && substr($rule, -1) == '/') {  
		  $rule_reg = substr($rule, 1, strlen($rule) - 2);  
		} else {  
		  $rule_reg = LinkController::reg_encode($rule);  
		}  
		// 以|结尾，替换为$结尾  
		if (preg_match("/\|$/i", $rule_reg)) {  
		  $rule_reg = substr($rule_reg, 0, strlen($rule_reg) - 1)."$";  
		}  
		$find_function_content.='if (/' . $rule_reg . '/i.test(url)) return '.$return_proxy.';'."\n";  
		$count = $count + 1;  
	  }  
	  $find_function_content.='return DEFAULT;'."}";  
	  $pac_content.=$find_function_content;   
	  return $pac_content;  
	}  
	
	
	private static function get_mac_pac() {  
	  $rulelist = base64_decode(file_get_contents("https://raw.githubusercontent.com/gfwlist/gfwlist/master/gfwlist.txt"));  
	  $gfwlist = explode("\n", $rulelist);  
	  $gfwlist[] = ".google.com";  
	  
	  $count = 0;  
	  $pac_content = '';   
	  $find_function_content = 'function FindProxyForURL(url, host) { var PROXY = "SOCKS5 127.0.0.1:1080; SOCKS 127.0.0.1:1080; DIRECT;"; var DEFAULT = "DIRECT";'."\n";  
	  foreach($gfwlist as $index=>$rule) {  
		if (empty($rule))  
		  continue;  
		else if (substr($rule, 0, 1) == '!' || substr($rule, 0, 1) == '[')  
		  continue;  
		$return_proxy = 'PROXY';  
		// @@开头表示默认是直接访问  
		if (substr($rule, 0, 2) == '@@') {  
		  $rule = substr($rule, 2);  
		  $return_proxy = "DEFAULT";  
		}  
	  
		// ||开头表示前面还有路径  
		if (substr($rule, 0, 2) =='||') {  
		  $rule_reg = "^[\\w\\-]+:\\/+(?!\\/)(?:[^\\/]+\\.)?".LinkController::reg_encode(substr($rule, 2));  
		// !开头相当于正则表达式^  
		} else if (substr($rule, 0, 1) == '|') {  
		  $rule_reg = "^" . LinkController::reg_encode(substr($rule, 1));  
		// 前后匹配的/表示精确匹配  
		} else if (substr($rule, 0, 1) == '/' && substr($rule, -1) == '/') {  
		  $rule_reg = substr($rule, 1, strlen($rule) - 2);  
		} else {  
		  $rule_reg = LinkController::reg_encode($rule);  
		}  
		// 以|结尾，替换为$结尾  
		if (preg_match("/\|$/i", $rule_reg)) {  
		  $rule_reg = substr($rule_reg, 0, strlen($rule_reg) - 1)."$";  
		}  
		$find_function_content.='if (/' . $rule_reg . '/i.test(url)) return '.$return_proxy.';'."\n";  
		$count = $count + 1;  
	  }  
	  $find_function_content.='return DEFAULT;'."}";  
	  $pac_content.=$find_function_content;   
	  return $pac_content;  
	}  
	




}