## 阿哥。。。config文件坑我好惨 ###
dbname不对dbconnstring不对是dbpassword也不对。。。。
## cookie和session的功能 ##
* cookie  
    一个服务器在计算机里留下的小文件，每当相同的计算机通过浏览器请求页面时，它同时会发送 cookie。  
    可以用来识别用户，可以跨页面调用信息
* session
    为每个访问者创建一个唯一的 id (UID)，并基于这个 UID 来存储变量。UID 存储在 cookie 中，亦或通过 URL 进行传导。  
    通过在服务器上存储用户信息以便随后使用。用于存储有关用户会话的信息，或更改用户会话的设置。
## cookie和session的比较 ##
1. cookie存储在客户端浏览器上，session在服务器上，对于访问要求较多的网站压力比较大
2. cookie相比来说比较不安全
3. cookie可能会被浏览器禁用，session不会
4. session不能够跨域名访问
5. cookie比较小，个数也不能太多 session没有（最好不要太大）