id:int(10) AI PK 

sender:varchar(10) NOT NULL

content:varchar(255) NOT NULL

send_time:varchar(100)

［新增］

id:自動編號

sender:必填/發佈人

content:必填/內容

send_time:系統當前時間
```mermaid
  flowchart TD;
      A[index.html]--1.GET:sender/content-->B[send_message.php];
      B[send_message.php:在資料庫新增資料]--2.ID/sender/content/send_time-->A[index.html];
      A[index.html]--3.呼叫函式-->C[main.php:撈資料庫資料日期換算];
      C[main.php:撈資料庫資料日期換算]--4.回傳資料顯示-->A[index.html]
```

［修改］
```mermaid
  flowchart TD;
      A[index.html]--1.GET:id-->B[Update.php:獲取id並傳送表單];
      B[Update.php:獲取id並傳送表單]--2.POST:id/sender/content-->C[postEdit.php:修改資料庫資料];
      C[postEdit.php:修改資料庫資料]--3.回傳資料-->A[index.html];
      A[index.html]--4.呼叫函式-->D[main.php:撈資料庫資料日期換算];
      D[main.php:撈資料庫資料日期換算]--5.回傳資料顯示-->A[index.html]
```

［刪除］
```mermaid
  flowchart TD;
      A[index.html]--1.GET:id-->B[del.php:刪除資料庫對應id資料];
      B[del.php:刪除資料庫對應id資料]--2.更新頁面-->A[index.html];
```

［查詢］

#查詢人

sender:必填/發佈人

```mermaid
  flowchart TD;
      A[index.html]--1.GET:sender-->B[search_sender.php:精準比對資料庫內容並顯示結果];
```
#查詢內容

content:必填/內容

```mermaid
  flowchart TD;
      A[index.html]--1.GET:content-->B[search_content.php:精準比對資料庫內容並顯示結果];
```
