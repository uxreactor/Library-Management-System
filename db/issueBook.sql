



INSERT INTO `tbl_issued_books`(`mem_id`, `book_id`, `issue_date`, `return_expected`)
SELECT * FROM (SELECT '$memberId', '$bookId', '$issuedDate', '$returnDate') AS tmp
WHERE NOT EXISTS (
    SELECT `book_id` FROM `tbl_issued_books` WHERE `book_id` = '$bookId'
)

