Codeigniter SMS Helper
================================

This repository contains a Helper for codeigniter to send sms using Spring Edge (https://www.springedge.com) APIs

Requirements
------------

- [Sign up](https://www.springedge.com/) for a free Trail Messaging account
- Create a new `apikey` from developers section of sms account
- Setup sender name for sms account.
- A working envounment to run codeigniter.


Installation
------------

You can copy entire repository or just replace helper file `sendsms_helper.php` from `application/helpers/` directory.
Configure API key and Sender name in helper.

Usage
-----

Load Helper:
```
$this->load->helper('sendsms_helper');

```

Example of sending message:

```
//call this function to send sms
sendsms( '919918xxxxxx', 'test message' ); 

```

Success Response:

```
{
 "groupID":xxxxxx,
 "MessageIDs":"xxxxxxx-xx",
 "status":"AWAITED-DLR"
}
```


Or in case of an error:

```
{
  "error":"Invalid Mobile Numbers"
}
```


Support
-------------

For any support or query please visit:
[https://www.springedge.com](https://www.springedge.com)
