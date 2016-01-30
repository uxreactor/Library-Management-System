-- Select unique columns from the tables tbl_book_varities and tbl_all_books group by the book_name

SELECT * FROM `tbl_book_varities` a join `tbl_all_books` b WHERE a.isbn = b.isbn GROUP BY book_name;



-- Select the count of unique columns from the tables tbl_book_varities and tbl_all_books group by the book_name

SELECT COUNT(*) FROM `tbl_book_varities` a join `tbl_all_books` b WHERE a.isbn = b.isbn GROUP BY book_name;


-- 
SELECT book_name As "Book Name", COUNT(*) AS "# of Books" FROM `tbl_book_varities` a join `tbl_all_books` b WHERE a.isbn = b.isbn GROUP BY book_name


SELECT book_name As "Book Name",`author_name` AS "Author", `publisher` as "Publisher", `category` AS "Category", COUNT(*) AS "# of Books" FROM `tbl_book_varities` a join `tbl_all_books` b WHERE a.isbn = b.isbn GROUP BY book_name

SELECT * FROM `tbl_members` m JOIN tbl_membership n WHERE m.ms_id = n.ms_id

