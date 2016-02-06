loadAllBooks.sql



SELECT 
    a.`book_name` AS "Book Name",
    a.`author_name` AS "Author Name",
    a.`category` AS "Category",
    a.`publisher` AS "Publisher",
    a.`edition` AS "Edition",
    a.`price` AS "Book Price",
	a.`isbn` AS "ISBN Number", 
	COUNT(b.`isbn`) AS "Qty" 
FROM `tbl_book_varities` a 
	LEFT JOIN `tbl_all_books` b on a.`isbn` = b.`isbn`
GROUP BY b.`isbn`