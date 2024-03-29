# Summary XSS


### Contents
- [Khái niệm XSS](https://github.com/chi442000/XSS#Concept)
- [Tấn công thực hiện như thế nào?](https://github.com/chi442000/XSS#realistic-attack)
- [Các loại tấn công XSS](https://github.com/chi442000/XSS#types-of-attacks)
    - [Reflected XSS](https://github.com/chi442000/XSS#reflected-xss)
    - [Stored XSS](https://github.com/chi442000/XSS#stored-xss)
    - [DOM Based XSS](https://github.com/chi442000/XSS#dom-based-xss)
- [Cách để kiểm thử tấn công XSS](https://github.com/chi442000/XSS#attack-testing)
- [Các cách để ngăn chặn XSS](https://github.com/chi442000/XSS#prevent)
- [Kết luận](https://github.com/chi442000/XSS#in-conclusion)


### Concept
- Cross Site Scripting (XSS) là một trong những tấn công phổ biến và dễ bị tấn công nhất mà tất cả các Tester có kinh nghiệm đều biết đến. Nó được coi là một trong những tấn công nguy hiểm nhất đối với các ứng dụng web và có thể mang lại những hậu quả nghiêm trọng. Giới thiệu về tấn công XSS Tấn công XSS là một đoạn mã độc, để khái thác một lỗ hổng XSS, hacker sẽ chèn mã độc thông qua các đoạn script để thực thi chúng ở phía Client. Thông thường, các cuộc tấn công XSS được sử dụng để vượt qua truy cập và mạo danh người dùng.
- Mục đích chính của cuộc tấn công này là ăn cắp dữ liệu nhận dạng của người dùng như: cookies, session tokens và các thông tin khác. Trong hầu hết các trường hợp, cuộc tấn công này đang được sử dụng để ăn cắp cookie của người khác. Như chúng ta biết, cookie giúp chúng tôi đăng nhập tự động. Do đó với cookie bị đánh cắp, chúng tôi có thể đăng nhập bằng các thông tin nhận dạng khác. Và đây là một trong những lý do, tại sao cuộc tấn công này được coi là một trong những cuộc tấn công nguy hiểm nhất.
- Tấn công XSS đang được thực hiện ở phía client. Nó có thể được thực hiện với các ngôn ngữ lập trình phía client khác nhau. Tuy nhiên, thường xuyên nhất cuộc tấn công này được thực hiện với Javascript và HTML.


### Realistic Attack

Tấn công Cross Site Scripting nghĩa là gửi và chèn lệnh và script độc hại, những mã độc này thường được viết với ngôn ngữ lập trình phía client như Javascript, HTML, VBScript, Flash… Tuy nhiên, cách tấn công này thông thường sử dụng Javascript và HTML. Cách tấn công này có thể được thực hiện theo nhiều cách khác nhau, phụ thuộc vào loại tấn công XSS, những mã độc có thể được phản chiếu trên trình duyệt của nạn nhân hoặc được lưu trữ trong cơ sở dữ liệu và được chạy mỗi khi người dùng gọi chức năng thích hợp. Nguyên nhân chính của loại tấn công này là xác thực đầu vào dữ liệu người dùng không phù hợp, dữ liệu độc hại từ đầu vào có thể xâm nhập vào dữ liệu đầu ra. Mã độc có thể nhập một script và được chèn vào mã nguồn của website. Khi đó trình duyệt không thể biết mã thực thi có phải độc hại hay không. Do đó mã độc hại có thể đang được thực thi trên trình duyệt của nạn nhận hoặc bất kỳ hình thức giả nào đang được hiển thị cho người sử dụng. Có một số hình thức tấn công XSS có thể xảy ra. Bên dưới là những hình thức tấn công chính của Cross Site Scripting:
- Cross Site Scripting có thể xảy ra trên tập lệnh độc hại được thực hiện ở phía client.
- Trang web hoặc form giả mạo được hiển thị cho người dùng (nơi nạn nhân nhập thông tin đăng nhập hoặc nhấp vào liên kết độc hại).
- Trên các trang web có quảng cáo được hiển thị.
- Email độc hại được gửi đến nạn nhân. Tấn công xảy ra khi tin tặc tìm kiếm những lỗ hổng trên website và gửi nó làm đầu vào độc hại. Tập lệnh độc hại được tiêm vào mã lệnh và sau đó được gửi dưới dạng đầu ra cho người dùng cuối cùng.

Chúng ta hãy phân tích một ví dụ đơn giản sau đây: Tưởng tượng chúng ta có 1 trang web với chức năng Search.

Nếu chức năng Search có lỗ hổng, khi người dùng nhập bất kỳ đoạn script thì nó sẽ được thực thi.

**Ví dụ 1:** Người dùng nhập đoạn script đơn giản như sau:
![example](1.png)

Lúc đó sau khi nhấn nút “Search”, script được nhập sẽ được thực hiện.

![example](2.png)

Như chúng ta thấy trong Ví dụ, script đã nhập vào trường Search được thực thi. Điều này chỉ cho thấy lỗ hổng của cuộc tấn công XSS. Tuy nhiên, một tập lệnh có hại hơn cũng có thể được nhập. Nhiều Tester kết hợp tấn công Cross Site Scripting với Javascript Injection, cũng đang được thực hiện ở phía client. Trong cả hai, các script tấn công độc hại đang được tiêm. Tuy nhiên, trong trường hợp tấn công XSS, các thẻ < script > không cần thiết để thực thi script.

**Ví dụ 2:** Hãy xem xét rằng trong trường review nếu hacker nhập đoạn code sau:

**< script >destroyWebsite();< /script>**

Sau đó, hàm destroyWebsite() sẽ được gọi và nó sẽ thực hiện các hành động có hại của nó. Như hầu hết chúng ta biết, cuộc tấn công này chủ yếu được sử dụng để thu thập cookie của người khác, có thể được sử dụng để đăng nhập bằng các danh tính khác. Hãy để chúng tôi phân tích một ví dụ khác về kịch bản XSS có thể có với hành vi trộm cắp cookie có thể xảy ra.

**Ví dụ 3:** thông qua lỗ hổng của website, tin tặc sẽ tiêm mã thích hợp.

**< script type=”text/javascript”>Var test=’../example.php?cookie_data=’+escape(docuent.cookie);< /script>**

Như đã thấy trong Ví dụ trên, cookie bị mất và được gửi tới biến ‘cookie_data’ của tập lệnh mẫu example.php. Nếu hacker sẽ chèn tập lệnh này vào mã của trang web, thì mã sẽ được thực thi trong trình duyệt của người dùng và cookie sẽ được gửi tới hacker.

### Types of Attacks

Có 3 loại tấn công XSS chính như sau:

### Reflected XSS

Reflected XSS là dạng tấn công thường gặp nhất trong các loại hình XSS. Với Reflected XSS, hacker không gửi dữ liệu độc hại lên server nạn nhân, mà gửi trực tiếp link có chứa mã độc cho người dùng, khi người dùng click vào link này thì trang web sẽ được load chung với các đoạn script độc hại.

Có nhiều hướng để khai thác thông qua lỗi Reflected XSS, một trong những cách được biết đến nhiều nhất là chiếm phiên làm việc (session) của người dùng, từ đó có thể truy cập được dữ liệu và chiếm được quyền của họ trên website. Chi tiết được mô tả qua những bước sau:

![example](3.png)

**Ví dụ:** Ta có thể thấy lỗi Reflected XSS trong chức năng tìm kiếm của website này. Khi tìm kiếm dữ liệu, website trả về dữ liệu mà mình nhập vào. Từ đó ta có thể sử dụng lỗi reflected xss để tấn công trang web này bằng lệnh: < script>alert(1)< /script> 

![example](4.png)

#### Stored XSS

Khác với Reflected tấn công trực tiếp vào một số nạn nhân mà hacker nhắm đến, Stored XSS hướng đến nhiều nạn nhân hơn. Lỗi này xảy ra khi ứng dụng web không kiểm tra kỹ các dữ liệu đầu vào trước khi lưu vào cơ sở dữ liệu (ở đây tôi dùng khái niệm này để chỉ database, file hay những khu vực khác nhằm lưu trữ dữ liệu của ứng dụng web). Ví dụ như các form góp ý, các comment … trên các trang web. Với kỹ thuật Stored XSS , hacker không khai thác trực tiếp mà phải thực hiện tối thiểu qua 2 bước.

Đầu tiên hacker sẽ thông qua các điểm đầu vào (form, input, textarea…) không được kiểm tra kỹ để chèn vào CSDL các đoạn mã nguy hiểm.

![example](5.png)

Kịch bản khai thác:

![example](6.png)


Reflected XSS và Stored XSS có 2 sự khác biệt lớn trong quá trình tấn công.
Thứ nhất, để khai thác Reflected XSS, hacker phải lừa được nạn nhân truy cập vào URL của mình. Còn Stored XSS không cần phải thực hiện việc này, sau khi chèn được mã nguy hiểm vào CSDL của ứng dụng, hacker chỉ việc ngồi chờ nạn nhân tự động truy cập vào. Với nạn nhân, việc này là hoàn toàn bình thường vì họ không hề hay biết dữ liệu mình truy cập đã bị nhiễm độc.

Thứ hai, mục tiêu của hacker sẽ dễ dàng đạt được hơn nếu tại thời điểm tấn công nạn nhân vẫn trong phiên làm việc(session) của ứng dụng web. Với Reflected XSS, hacker có thể thuyết phục hay lừa nạn nhân đăng nhập rồi truy cập đến URL mà hắn ta cung cấp để thực thi mã độc. Nhưng Stored XSS thì khác, vì mã độc đã được lưu trong CSDL Web nên bất cứ khi nào người dùng truy cập các chức năng liên quan thì mã độc sẽ được thực thi, và nhiều khả năng là những chức năng này yêu cầu phải xác thực(đăng nhập) trước nên hiển nhiên trong thời gian này người dùng vẫn đang trong phiên làm việc.

Từ những điều này có thể thấy Stored XSS nguy hiểm hơn Reflected XSS rất nhiều, đối tượng bị ảnh hưởng có thế là tất cả nhưng người sử dụng ứng dụng web đó. Và nếu nạn nhân có vai trò quản trị thì còn có nguy cơ bị chiếm quyền điều khiển web.


#### DOM Based XSS

DOM-based XSS là nơi lỗ hổng bảo mật tồn tại trong mã phía client chứ không phải mã phía server. Hình thức này dùng để khai thác XSS dựa vào việc thay đổi HTML của tài liệu, hay nói cách khác là thay đổi cấu trúc DOM.

DOM Based XSS là kỹ thuật khai thác XSS dựa trên việc thay đổi cấu trúc DOM của tài liệu, cụ thể là HTML. 
 
Trong ví dụ dưới đây ta có thể sử dụng DOM Based XSS để thay đổi cấu trúc của câu lệnh tìm kiếm: ">< svg onload=alert(1)>

![example](7.png)

### Attack Testing
 
Trước tiên, để kiểm thử tấn công XSS, kiểm thử hộp đen có thể được thực hiện. Nó có nghĩa là, chúng ta có thể test mà không cần xem xét code. Tuy nhiên, xem xét code luôn là một việc nên làm và nó mang lại kết quả đáng tin cậy.

Trong khi bắt đầu kiểm thử, Tester nên xem xét phần nào của website là có thể bị tấn công XSS. Tốt hơn là liệt kê chúng trong tài liệu kiểm thử và bằng cách này, bảo đảm chúng ta sẽ không bị bỏ xót. Sau đó, tester nên lập kế hoạch cho các script nào phải được kiểm tra. Điều quan trọng là, kết quả có ý nghĩa gì, ứng dụng đó là dễ bị lỗ hổng và cần được phân tích các kết quả một cách kỹ lưỡng. Trong khi kiểm thử các cuộc tấn công có thể, điều quan trọng là kiểm tra xem nó đang được đáp ứng như thế nào với các kịch bản đã nhập và các kịch bản đó có được thực thi hay không vv.

Ví dụ, tester có thể thử nhập trên trình duyệt đoạn script sau:

< script>alert(document.cookie)< /script>

Nếu script được thực hiện, thì có một khả năng rất lớn, rằng XSS là có thể. Ngoài ra, trong khi kiểm thử thủ công để có thể tấn công Cross Site Scripting, điều quan trọng cần nhớ là các dấu ngoặc được mã hóa cũng nên được thử.

### Prevent XSS

Mặc dù loại tấn công này được coi là một trong những loại nguy hiểm và rủi ro nhất, nhưng vẫn nên chuẩn bị một kế hoạch ngăn ngừa. Bởi vì sự phổ biến của cuộc tấn công này, có khá nhiều cách để ngăn chặn nó.

Các phương pháp phòng ngừa chính được sử dụng phổ biến bao gồm:

- Data validation
- Filtering
- Escaping

1. Bước đầu tiên trong công tác phòng chống tấn công này là Xác thực đầu vào. Mọi thứ, được nhập bởi người dùng phải được xác thực chính xác, bởi vì đầu vào của người dùng có thể tìm đường đến đầu ra. Xác thực dữ liệu có thể được đặt tên làm cơ sở để đảm bảo tính bảo mật của hệ thống. Tôi sẽ nhắc nhở rằng ý tưởng xác thực không cho phép đầu vào không phù hợp. Vì vậy nó chỉ giúp giảm thiểu rủi ro, nhưng có thể không đủ để ngăn chặn lỗ hổng XSS có thể xảy ra.

2. Một phương pháp ngăn chặn tốt khác là lọc đầu vào của người dùng. Ý tưởng lọc là tìm kiếm các từ khóa nguy hiểm trong mục nhập của người dùng và xóa chúng hoặc thay thế chúng bằng các chuỗi trống. Những từ khóa đó có thể là:

Thẻ < script> < /script>

Lệnh Javascript

Đánh dấu HTML

Lọc đầu vào khá dễ thực hành. Nó có thể được thực hiện theo nhiều cách khác nhau. Như:

Bởi các developers đã viết mã phía server.

Thư viện ngôn ngữ lập trình thích hợp đang được sử dụng.

Trong trường hợp này, một số developer viết mã riêng của họ để tìm kiếm các từ khóa thích hợp và xóa chúng. Tuy nhiên, cách dễ dàng hơn là chọn thư viện ngôn ngữ lập trình thích hợp để lọc đầu vào của người dùng. Tôi muốn lưu ý rằng việc sử dụng thư viện là một cách đáng tin cậy hơn, vì các thư viện đó đã được nhiều nhà phát triển sử dụng và thử nghiệm.

3. Một phương pháp phòng ngừa khác có thể là ký tự Escape. Trong thực tế này, các ký tự thích hợp đang được thay đổi bằng các mã đặc biệt.

Ví dụ: < ký tự Escape có thể giống như & # 60. Điều quan trọng cần biết là chúng ta có thể tìm thấy các thư viện thích hợp với ký tự escape.

Trong khi đó, việc kiểm thử tốt cũng không nên quên điều đó. Chúng ta cần những kiểm thử phần mềm có kiến thức tốt và những công cụ kiểm thử phần mềm đáng tin cậy. Bằng cách này, chất lượng phần mềm sẽ được bảo đảm tốt hơn.
###  In conclusion

Trong khi thực hiện kiểm thử, Tester nên đánh giá các rủi ro mang lại từ các cuộc tấn công XSS có thể xảy ra. Tấn công XSS có thể ảnh hưởng đến các ứng dụng web, nó được coi là một trong những cuộc tấn công nguy hiểm và nguy hiểm nhất. Do đó, chúng ta không nên quên kiểm thử tấn công XSS này.

Trong khi thực hiện kiểm thử đối với XSS, điều quan trọng là phải có kiến thức tốt về tấn công XSS. Và đây là cơ sở để phân tích kết quả kiểm thử một cách chính xác và chọn các công cụ kiểm tra thích hợp. Qua bài viết, hi vọng các bạn có thể hiểu rõ hơn về tầm quan trọng của kiểm thử tấn công XSS và cách để thực hiện kiểm thử nó hiệu quả hơn.
