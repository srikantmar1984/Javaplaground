import java.sql.*;
import java.util.*;

class mysqlcon{
	public static void main(String args[]){
	try{
		Class.forName("com.Mysql.JdbcDriver");
		Connection con= DriverManager.getConnection("jdbc:mysql://localhost:3306/wsr","root","");
		Statement smt= con.createStatement();
		ResultSet rs = smt.executeQuery("Select * from t_wsr_accesslog");
		while(rs.next())
			System.out.println(rs.getInt(1)+rs.getString(2));
		con.close();
	}		
	catch(Exception e){
		System.out.println(e);
	}
}
}