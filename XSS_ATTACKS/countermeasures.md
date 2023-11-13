# Output Encoding :

- Output Encoding for "HTML Contexts".
- Output Encoding for "HTML Attribute Contexts"
- Output Encoding for “JavaScript Contexts”
- Output Encoding for “CSS Contexts”
- Output Encoding for “URL Contexts”

-----------

# How to mitigate XSS :

- Response Headers

  - x-xss-protection

    - [0](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/X-XSS-Protection#0)

      ​    Disables XSS filtering.  

    - [1](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/X-XSS-Protection#1)

      ​    Enables XSS filtering (usually default in browsers). If a  cross-site scripting attack is detected, the browser will sanitize the  page (remove the unsafe parts).  

    - [1; mode=block](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/X-XSS-Protection#1_modeblock)

      ​    Enables XSS filtering. Rather than sanitizing the page, the browser will prevent rendering of the page if an attack is detected.  

    - [1; report= (Chromium only)](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/X-XSS-Protection#1_reportreporting-uri_chromium_only)

      ​    Enables XSS filtering. If a cross-site scripting attack is  detected, the browser will sanitize the page and report the violation.  This uses the functionality of the CSP [`report-uri`](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/report-uri) directive to send a report.  

    Cette fonctionnalité est désormais considérée comme obsolète et a été supprimée de la plupart des navigateurs modernes. On utilise à la place "Content Security Policy".

- Filter User input

  -    **htmlspecialchars**(
      string `$string`,
      int `$flags` = ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401,
      ?string `$encoding` = **`null`**,
      bool `$double_encode` = **`true`**
    ): string

- Restrict user input

- Client Side vs Server side

  