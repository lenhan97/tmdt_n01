# Đồ án Thương mại điện tử - Nhóm 01

Trang web bán laptop C2C viết bằng Wordpress

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

Project này mình chạy trên XAMPP nên sẽ hướng dẫn chủ yếu trên XAMPP

### Các tài khoản để test

Webmaster:

```
Tài khoản đăng nhập: Username/Password
admin / admin123
Tài khoản Paypal để test: 
ltshop_admin@gmail.com / admin123
```

Account merchant:

```
Tài khoản đăng nhập: Username/Password
merchantA / merchant1
merchantB / merchant2
Tài khoản Paypal để test: 
ltshop_merchantA@gmail.com / merchant1
ltshop_merchantB@gmail.com / merchant2
```

Account customer:

```
Tài khoản đăng nhập: Username/Password
customerX / customer1
customerY / customer2
Tài khoản Paypal để test: 
ltshop_customerX@gmail.com / customer1
ltshop_customerY@gmail.com / customer2
```

### Installing

Để cài đặt webapps ta cần thực hiện các bước sau:

Bước 1: Clone Project về máy (nếu đã có file cài đặt, bỏ qua bước này)
![Clone Project](/readme/clone_project.png?raw=true "Clone Project")

Bước 2: Bỏ file nén vào thư mục htdocs của XAMPP. Giải nén file và đổi tên thư mục vừa giải nén thành TMDT_N01
Ví dụ: Giả sử bạn cài XAMPP ở ô C ta sẽ có đường dẫn của file sau bước này là:
```
C:\xampp\htdocs\TMDT_N01
```

Bước 3: Tạo 1 cơ sở dữ liệu mới trong database của MySQL với tên là tmdt_n01

```
tmdt_n01
```

Bước 4: Import file dữ liệu mới nhất nằm trong thư mục database vào cơ sở dữ liệu vừa tạo.
Ví dụ:

```
import file database/tmdt_n01.sql vào CSDL tmdt_n01
```

Bước 5: Vào địa chỉ localhost/TMDT_N01 để kiểm tra (Nhớ mở Apache và MySQL)

```
localhost/TMDT_N01
```

Bước 6: Nếu XAMPP của máy bạn không chạy được ở port mặc định mà phải đổi port sẽ gây ra lỗi.
Ví dụ:

```
localhost:8080/TMDT_N01
```

Để khắc phục lỗi trên ta cần thực hiện các bước sau:

1) Vào thư mục wp-config.php thêm 2 dòng code sau vào đầu file:

Ví dụ địa chỉ của bạn để vào localhost là localhost:8080 thì ta viết:

```
define('WP_HOME','localhost:8080');
define('WP_SITEURL','localhost:8080');
```
![Define Link](/readme/define_link.png?raw=true "Define Link")

2) Tìm đoạn /** MySQL hostname */ trong file wp-config.php để sửa thành 'localhost:8080'

```
/** MySQL hostname */
define('DB_HOST', 'localhost:8080');
```

3) Ngoài ra bạn cũng nên kiểm tra xem username password để đăng nhập vào MySQL có đúng với với hệ thống của bạn hay không.
![Check Username Password](/readme/checkAccountMySQL.png?raw=true "Check Username Password")

4) Sau khi thực hiện các bước trên, nếu trang load lên bị lỗi 404 ta vào localhost:8080/wp-admin đăng nhập bằng tài khoản admin. Sau đó chọn Settings - Permalinks
![Permalinks](/readme/wp-admin.png?raw=true "Permalinks")

Trong đây chúng ta sẽ sửa các đường dẫn lại cho phù hợp bằng cách thêm :8080 sau localhost
![Permalinks2](/readme/permalinks.png?raw=true "Permalinks2")


Tới đây nếu bạn vẫn chưa chạy được ứng dụng vui lòng liên hệ địa chỉ mail doanphucsinh@gmail.com để được hướng dẫn thêm.

## Running the tests

Explain how to run the automated tests for this system

### Break down into end to end tests

Explain what these tests test and why

```
Give an example
```

### And coding style tests

Explain what these tests test and why

```
Give an example
```

## Deployment

Add additional notes about how to deploy this on a live system

## Built With

* [Wordpress](https://wordpress.org/) - The web framework used
* [MySQL](https://www.mysql.com/) - Database Management System

## Contributing

Please read [CONTRIBUTING.md](https://gist.github.com/PurpleBooth/b24679402957c63ec426) for details on our code of conduct, and the process for submitting pull requests to us.

## Versioning

We use [GitHub](http://github.com/) for versioning. For the versions available, see the [tags on this repository](https://github.com/sinhoisinh01/tmdt_n01/commits/master). 

## Authors

* **Đoàn Phúc Sinh** - *Team Member* - [Sinh Đoàn](https://github.com/sinhoisinh01)
* **Hồng Phúc Thạnh Đông** - *Team Member* - [Thạnh Đông](https://github.com/soco153)
* **Lê Quang Bảo** - *Team Member* - [Quang Bảo](https://github.com/LeQuangBao)

See also the list of [contributors](https://github.com/your/project/contributors) who participated in this project.

## License

Chưa có

## Acknowledgments

* Hat tip to anyone who's code was used
* Inspiration
* etc

