const monthSelect = document.getElementById('month-select');
const revenueTable = document.querySelector('.revenue-table tbody');

// Sử dụng một mảng dữ liệu mẫu để thực hiện demo
const revenueData = [
  { date: '1/1/2022', revenue: 1000 },
  { date: '2/1/2022', revenue: 2000 },
  { date: '3/1/2022', revenue: 3000 },
  { date: '4/1/2022', revenue: 4000 },
  { date: '5/1/2022', revenue: 5000 },
  { date: '6/1/2022', revenue: 6000 },
  { date: '7/1/2022', revenue: 7000 },
  { date: '8/1/2022', revenue: 8000 },
  { date: '9/1/2022', revenue: 9000 },
  { date: '10/1/2022', revenue: 10000 },
  { date: '11/1/2022', revenue: 11000 },
  { date: '12/1/2022', revenue: 12000 }
  ];
  // Hàm để cập nhật bảng doanh thu dựa trên tháng được chọn
function updateRevenueTable(month) {
    // Xóa bảng hiện tại để chuẩn bị cho việc cập nhật bảng mới
    revenueTable.innerHTML = '';
    
    // Lọc dữ liệu doanh thu dựa trên tháng được chọn
    const filteredData = revenueData.filter(item => {
    const monthString = `0${month}`.slice(-2); // Định dạng tháng thành chuỗi có độ dài 2 ký tự (ví dụ: 02)
    return item.date.endsWith(/${monthString}/2022);
    });
    
    // Thêm các hàng vào bảng dựa trên dữ liệu doanh thu đã lọc
    filteredData.forEach(item => {
    const row = document.createElement('tr');
    const dateCell = document.createElement('td');
    const revenueCell = document.createElement('td');});
}

// Khởi tạo bảng doanh thu với tháng đầu tiên được chọn là tháng 1
updateRevenueTable(1);

// Thêm sự kiện để cập nhật bảng doanh thu khi tháng được chọn thay đổi
monthSelect.addEventListener('change', () => {
const selectedMonth = parseInt(monthSelect.value);
updateRevenueTable(selectedMonth);
});