###Giới thiệu tổng quan
- CodeIgniter là một nền tảng ứng dụng web nguồn mở được viết bằng ngôn ngữ PHP
- Ý tưởng xây dựng CodeIgniter được dựa trên Ruby on Rails, một nền tảng ứng dụng web được viết bằng
ngôn ngữ Ruby

###Những điểm nổi bật
- Được thiết kế theo mô hình MVC, nó giúp cho việc thiết kế, xử lý và bảo trì mã nguồn dễ dàng, đồng thời tăng khả năng mở rộng của phần mềm.
CodeIgniter vận dụng mô hình này trong thiết kế, giúp tách biệt các tập tin giao diện với các tập tin xử lý dữ liệu,
nâng cao khả năng quản lý và dễ bảo trì.
- Nhỏ gọn, tốc độ nhanh, miễn phí
- Hệ thống thư viện phong phú, hỗ trợ search engine optimization
- Bảo mật tốt

###Cài đặt
- Yêu cầu hệ thống: CodeIgniter có thể hoạt động trên nhiều hệ điều hành và server, yêu
cầu cài đặt PHP phiên bản 4.x hoặc cao hơn; hệ quản trị cơ sở dữ liệu: MySQL (4.1+), MySQLi, Mircrosoft SQL Server, Oracle, SQLite, và ODBC...
- Hướng dẫn cài đặt:

 + Download bộ nguồn CodeIgniter tại website http://codeigniter.com/
 + Mở tập tin application/config/config.php, thay đổi giá trị $config['base_url']. Đây là đường dẫn tuyệt đối đến thư mục CodeIgniter trên server.
 + Thiết lập dữ liệu trong tập tin `application/config/database.php`

###Cấu trúc thư mục trong CodeIgniter
![aaa](https://cloud.githubusercontent.com/assets/4001514/6863680/3f190ec4-d488-11e4-8fba-056d75f2eeeb.jpg)

Tập tin index.php được xem như controller đầu vào, tiếp nhận các yêu cầu từ phía client và chuyển các yêu cầu này cho hệ thống xử lý.
- Thư mục `application`: Dành cho lập trình viên, các tập tin được lập trình cho ứng dụng sẽ lưu trong thư mục này.
- Thư mục `application/config`: Chứa các tập tin cấu hình hệ thống
- Thư mục `application/controllers`: chứa các lớp controller
- Thư mục `application/errors`: chứa các tập tin lỗi
- Thư mục `application/helpers`: chứa các hàm tiện ích do người dùng định nghĩa
- Thư mục `application/hooks`: chứa các tập tin để mở rộng mã nguồn CodeIgniter
- Thư mục `application/language`: chứa các tập tin ngôn ngữ
- Thư mục `application/libraries`: chứa c|c thư viện cho người dùng dùng định nghĩa
- Thư mục `application/models`: chứa các lớp model
- Thư mục `application/views`: chứa các lớp view
Ta cũng có thể đổi tên của thư mục application tùy ý. Sau khi đổi tên, cần thiết lập tên mới cho biến $application_folder trong tập tin index.php

###Tổ chức dữ liệu trong Codeigniter
![alt](http://viblo.framgia.vn/uploads/images/64e1fad9126db41c667e421ebb274919929ba458/2c7404e5115f8926ac0776c71f541bc1f19b2869.png)
- Tập tin index.php đóng vai trò làm controller đầu vào, thiết lập các tài nguyên cần thiết cho hệ thống.
- Routing: Điều hướng giúp xác định các yêu cầu và hướng xử lý đối với chúng.
- Caching: Nếu dữ liệu được yêu cầu đã được lưu trong bộ đệm, CodeIgniter sẽ trả dữ liệu trong bộ đệm về phía client. Quá trình xử lý kết thúc.
- Security: Dữ liệu trước khi được chuyển đến các Controller sẽ được lọc để phòng chống XXS hoặc SQL Injection.
- Application Controller: Controller xử lý dữ liệu nhận được bằng cách gọi đến các Models, Libraries, Helpers, Plugins...có liên quan.
- View: Dữ liệu được chuyển qua View để hiển thị cho người dùng. Nếu chức năng caching được bật, dữ liệu sẽ được lưu trong cache cho những lần yêu cầu tiếp theo.

###Cách kết nối dữ liệu trong Codeigniter
- Để sử dụng database ta khai báo lệnh sau:
`$this->load->database();`
Sau khi khai báo sử dụng thư viện, ta có thể truy xuất đến các phương thức của thư viện bằng đối tượng `$this->db`.
- Thông tin thiết lập data được lưu trong file
`application/config/database.php`

```php
$active_group = 'default';
$active_record = TRUE;

$db['default']['hostname'] = 'localhost';
$db['default']['username'] = 'root';
$db['default']['password'] = '';
$db['default']['database'] = 'test1_mysql';    //tên của data
$db['default']['dbdriver'] = 'mysql';         //loại csdl
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';                //Character set được sử dụng để giao tiếp với cơ sở dữ liệu
$db['default']['dbcollat'] = 'utf8_general_ci';    //Character collation được sử dụng để giao tiếp với cơ sở dữ liệu
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;
```

###Model
- Model là những lớp được xây dựng nhằm thực hiện việc trao đổi thông tin với cơ sở dữ liệu. Một lớp Model có thể thực hiện các tác vụ truy vấn, thêm, xóa, cập nhật dữ liệu.
- Một lớp model chuẩn trong CodeIgniter có cấu trúc như sau:

```php
class Muser extends CI_Model {
// Hàm tạo
public function __construct(){
  parent::__construct();
}

* Mô tả hàm
* @param kiểu dữ liệu $param mô tả biến
*/
public function list_user($per_page, $start){
  $this->db->limit($per_page, $start);
  $query = $this->db->get('user');
  return $query->result_array();
}
...
}
```
- Để sử dụng model trong controller, ta sử dụng đoạn mã sau:
```php
$this->load->Model("model name");
```

- Ví dụ:
```php
$this->load->Model("Muser");
```

- Gọi một hàm trong model thì ta gọi như sau:
```php
$this->Muser->list_user($config['per_page'], $start);
```

###View
- View là những tập tin HTML được xây dựng nhằm thể hiện dữ liệu trong model thành các giao diện tương t|c với người dùng. View có thể là một trang web hoàn chỉnh, hay chỉ là một phần của trang web (header, footer, sidebar...). Nội dung của tập tin view, ngoài mã HTML còn có thể chứa mã PHP.
- Để sử dụng view trong controller, ta gọi như sau:
```php
$this->load->view('view_name', $data);
```

 + view_name là tên của view
 + $data chứa các dữ liệu sẽ được hiển thị trong view
- Ví dụ:
```php
$this->load->view("layouts/layout", $temp);
```

###Controller
- Controller là những lớp đóng vai trò trung gian giữa view và model. Controller nhận các yêu cầu từ phía người dùng, kiểm tra chúng trước khi chuyển qua cho model. Sau khi model xử lý yêu cầu và trả dữ liệu về, controller chuyển sang view để hiển thị dữ liệu cho người dùng.
- Ví dụ cấu trúc một Controller:
```php
<?php
  class Users extends CI_Controller{
    public function __construct(){
      parent::__construct();
      varify_session();
      $this->load->Model("Muser");
      $this->output->enable_profiler(TRUE);
    }

    //show user
    function show(){
      $id = $this->uri->segment(2);
      $temp['template']="users/show";
      $temp['data']['user'] = $this->Muser->getInfo($id);
      $this->load->view("layouts/layout", $temp);
    }
}
?>
```

###Dưới đây tôi có làm demo về các function cơ bản: CRUD, search các bạn có thể tham khảo source code tại đây
- Một số hình ảnh trong demo:
![index](https://cloud.githubusercontent.com/assets/4001514/6863679/3f185e5c-d488-11e4-8e4b-5fb9fa308c50.png)
![canvas](https://cloud.githubusercontent.com/assets/4001514/6863681/3f213dce-d488-11e4-95dd-e4a98012f547.png)
