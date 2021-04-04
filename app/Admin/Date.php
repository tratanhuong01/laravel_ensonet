<?php

use Illuminate\Database\Eloquent\Model;

class Date extends Model
{

    public $NGAY = "WHERE NgayTao >= CONCAT(FORMAT(GETDATE(),'yyyy-MM-dd'),' 00:00:00.000') "
        + "AND NgayTao <= GETDATE() AND HoaDon.LoaiHoaDon = 0";
    public $NGAY_TRUOC = "WHERE NgayTao < CONCAT(FORMAT(GETDATE(),'yyyy-MM-dd'),' 00:00:00.000') "
        + "AND NgayTao >= CONCAT(FORMAT(GETDATE() - 1,'yyyy-MM-dd'),' 00:00:00.000') AND HoaDon.LoaiHoaDon = 0";
    public $TUAN = "WHERE NgayTao >= CONCAT(FORMAT(GETDATE() - "
        + "(SELECT CASE "
        + "When (SELECT DATEPART(WEEKDAY, GETDATE()) - 2) < 0 THEN 6"
        + "	ELSE (SELECT DATEPART(WEEKDAY, GETDATE()) - 2) "
        + "END AS RS)"
        + ",'yyyy-MM-dd'),' 00:00:00.000')"
        + "AND NgayTao <= GETDATE() AND HoaDon.LoaiHoaDon = 0";
    public $TUAN_TRUOC = "WHERE NgayTao < CONCAT(FORMAT(GETDATE() - (SELECT DATEPART(WEEKDAY, GETDATE()) + "
        + "(SELECT CASE "
        + "When (SELECT DATEPART(WEEKDAY, GETDATE()) - 2) < 0 THEN 6"
        + "	ELSE (SELECT DATEPART(WEEKDAY, GETDATE()) - 2) "
        + "END AS RS)),'yyyy-MM-dd'),' 00:00:00.000') "
        + "AND NgayTao >= CONVERT(datetime,CONCAT(FORMAT(GETDATE() - (SELECT DATEPART(WEEKDAY, GETDATE()) + "
        + "(SELECT CASE "
        + "When (SELECT DATEPART(WEEKDAY, GETDATE()) - 2) < 0 THEN 6"
        + "	ELSE (SELECT DATEPART(WEEKDAY, GETDATE()) - 2) "
        + "END AS RS)),'yyyy-MM-dd'),' 00:00:00.000')) - 7"
        + "AND HoaDon.LoaiHoaDon = 0";
    public $THANG = "WHERE NgayTao >= CONCAT(FORMAT(GETDATE() - DAY(GETDATE() - 1),'yyyy-MM-dd'),' 00:00:00.000')"
        + "AND NgayTao <= GETDATE() AND HoaDon.LoaiHoaDon = 0";
    public $THANG_TRUOC = "WHERE NgayTao < CONCAT(FORMAT(GETDATE() - DAY(GETDATE() - 1),'yyyy-MM-dd'),' 00:00:00.000')"
        + "AND NgayTao >= CONVERT(Datetime,CONCAT(FORMAT(GETDATE() - DAY(GETDATE()) - DAY(EOMONTH(GETDATE() - DAY(GETDATE())))"
        + " + 1,'yyyy-MM-dd'),' 00:00:00')) AND HoaDon.LoaiHoaDon = 0";
    public $NAM = "WHERE NgayTao >= DATEADD(yy, DATEDIFF(yy, 0, GETDATE()), 0) AND NgayTao <= GETDATE()  AND HoaDon.LoaiHoaDon = 0";
    public $NAM_TRUOC = "WHERE NgayTao < DATEADD(yy, DATEDIFF(yy, 0, GETDATE()), 0) "
        + "AND NgayTao >= dateadd(year, -1, DATEADD(yy, DATEDIFF(yy, 0, GETDATE()), 0))  AND HoaDon.LoaiHoaDon = 0";
}
