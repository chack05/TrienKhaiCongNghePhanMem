-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 23, 2025 lúc 02:25 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tutientruyen`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuong`
--

CREATE TABLE `chuong` (
  `chuong_id` int(11) UNSIGNED NOT NULL,
  `chuong_so` varchar(50) NOT NULL,
  `chuong_ten` mediumtext DEFAULT NULL,
  `chuong_noidung` longtext NOT NULL,
  `truyen_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Table lưu trữ thông tin Chương truyện';

--
-- Đang đổ dữ liệu cho bảng `chuong`
--

INSERT INTO `chuong` (`chuong_id`, `chuong_so`, `chuong_ten`, `chuong_noidung`, `truyen_id`) VALUES
(18, 'Chương 1', 'Chương 1 - Người Bạn Đến Từ Tương Lai', '', 21),
(19, '1', 'Viên thuốc độc', '', 23),
(20, 'Chương 1', 'Tập 1', '<h2><strong>Chuyện cậu kể</strong></h2><p>Tiếng còi ngân dài dưới màn mưa tháng Ba báo hiệu phà sắp rời bến.</p><p>Rung động mạnh khi thân phà to lớn rẽ biển băng về phía trước lan từ mông lên khắp cơ thể.</p><p>Vé của tôi là vé phòng hạng hai, nằm sát đáy phà. Chuyến hải trình tiến ra Tokyo kéo dài hơn mười tiếng đồng hồ, đến tối phà mới cập bến. Đây là lần thứ hai trong đời tôi đón chuyến phà này ra Tokyo. Tôi đứng dậy, bước tới cầu thang dẫn lên boong.</p><p>“Hình như tên đó có tiền sự…”</p><p>“Nghe đâu cậu ta vẫn bị cảnh sát theo dõi…”</p><p>Sau vụ việc xảy ra tại Tokyo cách đây hai năm rưỡi, tôi bắt đầu nghe mấy lời đồn như thế ở trường. Bị nói này nói nọ cũng chẳng hề gì (thật ra tôi còn thấy đồn đại là tất nhiên), song tôi vẫn không hé răng với ai trên đảo về vụ việc xảy ra ở Tokyo hè năm đó. Tôi từng đề cập vài chi tiết, nhưng chưa bao giờ nhắc đến phần quan trọng nhất, kể cả với bố mẹ, bạn bè hay cảnh sát.</p><p>Một mực giữ riêng câu chuyện của mùa hè ấy, tôi tìm đến Tokyo lần thứ hai. Giờ tôi đã 18 tuổi. Lần này đi là để sống tại thành phố ấy. Và để gặp lại người ấy.</p><p>&nbsp;</p><p>Cứ nghĩ đến đây là ngực tôi lại nóng ran, mặt như có lửa đốt. Tôi leo nhanh hơn để mau ra hứng gió biển.</p><p>&nbsp;</p><p>Đặt chân lên boong, tôi liền bị gió lạnh và mưa quất mạnh vào mặt. Như muốn thu hết chúng vào người, tôi hít thở thật sâu. Gió vẫn lạnh nhưng đã nức hơi xuân. Cuối cùng cũng tốt nghiệp cấp ba… Giờ này cảm giác đó mới rộn lên trong lòng tựa bản thông báo đến muộn. Chống khuỷu tay lên thanh vịn, tôi trông về phía hòn đảo đang dần lùi xa rồi ngước nhìn vùng trời cuồn cuộn gió. Vô vàn hạt mưa nhảy múa nơi xa hút tầm mắt.</p><p>Vào khoảnh khắc ấy, tôi bỗng rùng mình, toàn thân nổi gai ốc.</p><p>Lại nữa rồi. Tôi bất giác nhắm chặt mắt, bất động. Nước mưa táp vào mặt, tiếng mưa không ngừng dội vào màng nhĩ.</p><p>Mưa vẫn rơi ở đó suốt hai năm rưỡi nay. Tựa nhịp đập con tim không thể lặng im dù có cố nín thở. Tựa đôi mắt không bao giờ chìm hẳn vào bóng tối dù gắng nhắm thật chặt. Tựa cõi lòng không cách nào bình yên dù nỗ lực trấn tĩnh.</p><p>Tôi chậm rãi thở ra và mở mắt.</p><p>Mưa.</p><p>Mưa liên tục bị hút xuống mặt biển đen thẫm, nhấp nhô như hít thở. Chẳng khác nào trời và biển bắt tay nhau, nghịch ngợm xô đẩy mặt nước. Tôi bỗng thấy sợ. Từng đợt run rẩy dâng lên từ thẳm sâu cơ thể. Tôi ngỡ mình sắp bị xé rách, sắp rã thành từng mảnh. Bám chặt thanh vịn, tôi hít vào thật sâu qua mũi. Hình ảnh người ấy lại hiện về như mọi khi. Cô gái với đôi mắt to, biểu cảm sinh động, tông giọng biến hóa liên tục và mái tóc dài buộc thành hai chùm. Rồi tôi nghĩ, “Sẽ ổn thôi.” Cô ở đó. Cô đang sống ở Tokyo. Chừng nào còn có cô, tôi còn được gắn kết với thế giới.</p><p>“… Vậy nên Hodaka à, đừng khóc.”</p><p>Đêm ấy, trong khách sạn ở Ikebukuro nơi chúng tôi ẩn nấp, cô đã nói thế. Tiếng mưa giội xuống trần nhà nghe như tiếng trống vọng tới từ xa. Tóc cô thơm mùi dầu gội hai đứa dùng chung, giọng nói dịu dàng như thể sẵn sàng thứ tha tất cả, làn da ánh sắc trắng xanh giữa bóng tối. Tất cả quá đỗi sống động, đến độ tôi bỗng có cảm giác lúc này mình vẫn đang ở đó.</p><p>Phải chăng chúng tôi quả thật vẫn ở khách sạn, và tôi chỉ tình cờ gặp hiện tượng kí ức ảo giác mà tưởng tượng cảnh bản thân ở tương lai đi phà? Phải chăng lễ tốt nghiệp hôm qua lẫn chuyến phà hôm nay đều là ảo giác, còn tôi thực sự vẫn nằm trên giường khách sạn? Rồi sớm mai thức dậy, mưa đã tạnh, cô vẫn ở bên tôi, diện mạo thế giới vẹn nguyên như trước giờ, và một ngày như mọi ngày lại bắt đầu?</p><p>Còi hú vang.</p><p>Không, không đúng. Tôi xác nhận xúc giác khi nắm lấy thanh vịn sắt, xác nhận mùi thủy triều, xác nhận hòn đảo dần khuất bóng nơi chân trời. Nhầm rồi, giờ không phải buổi tối. Chuyện đã lùi xa vào quá khứ. “Tôi” đang lắc lư trên phà này là tôi thực sự. Ngẫm kĩ đi. Nhớ lại từ đầu đi. Tôi vừa nhìn màn mưa chăm chăm vừa nghĩ. Trước khi gặp lại cô, phải hiểu hết những việc đã xảy đến với hai đứa. Không, dẫu không hiểu cũng phải suy nghĩ cho cặn kẽ.</p><p>Chuyện gì đã xảy đến với chúng tôi? Chúng tôi đã lựa chọn gì? Còn tôi, sắp tới nên nói gì với cô?</p><p>Căn nguyên của mọi việc… Phải, có lẽ là hôm đó.</p><p>Ngày cô chứng kiến&nbsp;<i>hiện tượng kia</i>&nbsp;lần đầu tiên. Sự việc mà sau này cô kể tôi nghe chính là khởi đầu của tất cả.</p><p>*</p><p>Mẹ cô hôn mê suốt nhiều tháng nay.</p><p>Trong phòng bệnh nhỏ chỉ có âm báo điện từ đều đặn phát ra từ màn hình theo dõi bệnh nhân, tiếng tút dài của máy thở và tiếng mưa dai dẳng đập vào cửa sổ. Cùng với đó là bầu không khí tách biệt đặc trưng của những phòng bệnh có bệnh nhân nằm lâu ngày.</p><p>Ngồi trên ghế đẩu cạnh giường bệnh, cô nắm chặt bàn tay chỉ còn da bọc xương, dõi theo chiếc mặt nạ oxy đều đặn chuyển màu trắng mờ theo nhịp thở, đăm đăm ngắm hàng mi khép chặt của mẹ.</p><p>Dầu bị nỗi bất an đè nặng, cô vẫn một lòng cầu nguyện. Cầu cho mẹ tỉnh lại. Cầu cho gió mạnh thổi tới như vị anh hùng xuất hiện giữa lúc nguy nan, quét sạch những thứ u ám và nặng nề, bất kể u uất, lo lắng hay mây đen, rồi gia đình ba người lại có thể tươi cười sánh bước dưới trời quang.</p><p>Tóc cô chợt lay động. Tiếng nước tong tong nho nhỏ vẳng vào tai.</p><p>Cô ngẩng đầu.</p><p>Cửa sổ vốn khép chặt, vậy mà rèm vẫn khẽ đung đưa. Ánh mắt cô bị hút về phía khoảng trời ngoài khung cửa. Vầng dương đã chiếu rọi tự khi nào. Mưa chưa ngừng, nhưng một khe hở nhỏ đã xuất hiện giữa tầng mây. Những tia sáng mảnh lách qua khe hở, soi sáng một điểm trên mặt đất. Cô căng mắt nhìn. Vô số tòa nhà trải dài hút tầm mắt. Duy có sân thượng của một trong số đó bừng sáng tựa diễn viên đứng dưới ánh đèn sân khấu.</p><p>Như thể nghe ai gọi, cô chạy ào khỏi phòng bệnh.</p><p>Cô dừng bước trước một tòa nhà bỏ hoang. Các kiến trúc lân cận đều mới toanh, riêng tòa nhà phức hợp này mục nát, xám xịt như bị thời gian lãng quên. Hàng loạt biển hiệu gỉ sét phai màu, nào “Bi-a”, “Cửa hàng kim khí”, nào “Lươn”, “Mạt chược”… treo tứ phía. Cô ngẩng đầu, nhìn qua lớp ô nhựa trong suốt. Nắng quả thật đang rọi xuống sân thượng. Liếc sang hông tòa nhà, cô thấy bãi đỗ xe nhở cùng cầu thang thoát hiểm hoen gỉ cũ kĩ dẫn lên sân thượng.</p><p>Hệt một vũng ánh sáng.</p><p>Leo hết cầu thang, cô sững lại giây lát, mê mẩn ngắm cảnh sắc trước mắt.</p><p>Sân thượng có lan can bao quanh, rộng chừng phân nửa hồ bơi dài 25 mét. Gạch lát nền vỡ gần hết, phủ một lớp cỏ dại xanh mướt. Ở góc sân có một cổng torii<a href=\"sigil:///private/var/folders/_t/r641d2816d7fy5ckhpv07ldc0000gn/T/Sigil-lIigBG/OEBPS/Text/fn.xhtml#n1\">[1]</a>&nbsp;nhỏ đứng im lìm như nằm trong lòng bụi cây. Nắng xuyên qua tầng mây, chiếu thẳng xuống cổng. Dưới chùm nắng, màu đỏ tươi ánh lên lấp lánh bên những hạt mưa. Đây là nơi duy nhất rạng rỡ giữa thế giới mưa phủ mờ này.</p><p>Cô chậm rãi băng qua sân, tiến về phía cổng. Cứ mỗi bước giẫm trên lớp cỏ mùa hè đẫm mưa, âm thanh loạt soạt êm tai lại vang lên cùng cảm giác đàn hồi dễ chịu. Những tòa cao ốc trắng đục vươn mình thẳng tắp sau màn mưa. Không gian ríu rít tiếng chim non. Dường như đâu đây có tổ chim. Thoảng trong đó là âm thanh tuyến Yamanote xa xôi tựa hồ vẳng đến từ thế giới khác.</p><p>Cô đặt ô xuống đất. Cái lạnh của cơn mưa ve vuốt đôi gò má mịn màng của cô. Sau cổng torii có một ngôi miếu nhỏ bằng đá, hoa tím li ti mọc kín xung quanh. Không biết ai đã đặt hai cỗ xe ngựa vong hồn<a href=\"sigil:///private/var/folders/_t/r641d2816d7fy5ckhpv07ldc0000gn/T/Sigil-lIigBG/OEBPS/Text/fn.xhtml#n2\">[2]</a>&nbsp;dùng cho lễ Obon<a href=\"sigil:///private/var/folders/_t/r641d2816d7fy5ckhpv07ldc0000gn/T/Sigil-lIigBG/OEBPS/Text/fn.xhtml#n3\">[3]</a>&nbsp;tại đó. Trông chúng như bị vùi vào vạt hoa. Một bằng cà tím, một bằng dưa chuột, đứng trên bốn que tre mảnh. Gần như vô thức, cô chắp tay, khẩn thiết cầu nguyện. Cầu cho mưa tạnh. Cô chậm rãi khép mi, vừa cầu nguyện vừa bước qua cổng. Cầu cho mẹ tỉnh lại và cùng cô bước đi dưới trời quang.</p><p>Qua khỏi cổng torii, không khí lập tức thay đổi.</p><p>Tiếng mưa ngừng bặt.</p><p>Và rồi cô mở mắt… giữa bốn bề là trời xanh.</p><p>Gió lớn thổi cô bay bồng bềnh trên tầng không cao vời vợi. Không, chính xác là cô đang rẽ gió rơi xuống. Tiếng gió hú trầm thăm thẳm chưa từng nghe trong đời cuộn xoáy xung quanh. Cứ mỗi nhịp thở ra, hơi thở lại đông trắng, lấp lánh bay lượn giữa vùng trời xanh thẳm. Vậy mà cô không hề sợ hãi, cảm giác kì lạ như thể đang mơ trong khi vẫn tỉnh táo. Dưới chân là những cột mây vũ tích trông như cây súp lơ khổng lồ trôi lơ lửng. Mỗi đám mây phải rộng đến mấy kilomet, tạo nên một khu rừng trên không tráng lệ.</p><p>Cô chợt nhận thấy sắc mây đang biến đổi. Từng đốm xanh nối nhau xuất hiện trên đỉnh những đám mây, nơi bằng phẳng như đồng bằng và tiếp giáp với không khí. Cô mở to mắt theo dõi cảnh tượng ấy.</p><p>Giống thảo nguyên quá. Những chấm màu xanh lục nhộn nhịp hiện ra rồi biến mất trên đỉnh mây, nơi mà người dưới đất chắc chắn không thể nhìn thấy. Để ý kĩ, cô còn thấy thứ gì đó bé xíu tựa sinh vật sống tập trung thành đàn khắp bốn bề.</p><p>“… Cá?”</p><p>Quần thể khoan thai uốn lượn thành hình xoáy ấy giống hệt đàn cá. Cô vừa rơi vừa nhìn không chớp mắt. Vô số cá đang bơi lội giữa bình nguyên trên mây.</p><p>Đột nhiên, ngón tay cô chạm phải thứ gì đó. Cô kinh ngạc nhìn xuống tay. Quả nhiên là cá. Những chú cá nhỏ với cơ thể trong suốt bơi qua ngón tay và tóc cô như những cơn gió có trọng lượng. Có con vây dài ve vẩy, có con tròn như sứa, có con lại mảnh dẻ như cá sóc. Bầy cá trong suốt muôn hình muôn vẻ lấp lánh như lăng kính dưới nắng. Chẳng rõ tự khi nào, cô đã bị vây giữa đàn cá trời.</p><p>Trời xanh, mây trắng, màu xanh lục lao xao, đàn cá ánh sắc cầu vồng. Cô đang hiện diện giữa thế giới trên không đẹp đẽ và kì lạ, chưa từng nghe qua mà cũng chưa từng tưởng đến. Cuối cùng, mây đen vần vũ dưới chân cô dần biến mất như thể tan chảy. Phố phường Tokyo mênh mông hiện ra dưới tầm mắt. Từng tòa nhà, từng chiếc xe, từng tấm kính cửa sổ tắm mình dưới nắng, kiêu hãnh rực sáng. Cô cưỡi gió, chầm chậm đáp xuống thành phố vừa tái sinh sau khi được mưa gột rửa. Cảm giác hợp thể lạ lùng từ từ lan đi khắp người. Bằng một dạng giác quan tồn tại trước cả ngôn từ, cô hiểu rằng mình là một phần của thế giới. Mình là gió, là nước, là xanh, là trắng, là trái tim, là nguyện ước. Niêm hạnh phúc cùng nỗi day dứt lạ thường xâm chiếm châu thân. Và rồi, ý thức dần tan biến tựa hồ lún sâu vào tấm đệm dày..</p><p>*</p><p>“Cảnh tượng đó… Có thể những gì tớ thấy khi ấy đều là mơ…” Cô từng nói với tôi như thế.</p><p>Song đó không phải mơ. Giờ đây chúng tôi đã biết đó là thật. Sau ngày cô kể tôi nghe, hai đứa còn tận mắt chiêm ngưỡng khung cảnh tương tự một lần nữa, chiêm ngưỡng thế giới trên trời không ai biết đến.</p><p>Vào mùa hè tôi cùng cô trải qua năm ấy, trên bầu trời Tokyo, chúng tôi đã thay đổi hoàn toàn bộ mặt của thế giới.</p>', 28),
(21, 'Chương 1', 'Bình minh của cuộc phiêu lưu', '', 32);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuong_hinhanh`
--

CREATE TABLE `chuong_hinhanh` (
  `chuong_hinhanh_id` int(10) UNSIGNED NOT NULL,
  `chuong_id` int(11) UNSIGNED NOT NULL,
  `chuong_hinhanh_tenhinh` mediumtext NOT NULL,
  `chuong_hinhanh_order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chuong_hinhanh`
--

INSERT INTO `chuong_hinhanh` (`chuong_hinhanh_id`, `chuong_id`, `chuong_hinhanh_tenhinh`, `chuong_hinhanh_order`) VALUES
(415, 18, '20250323_140047_nhasachmienphi-truyen-tranh-doremon-333102-14.jpg', NULL),
(416, 18, '20250323_140047_nhasachmienphi-truyen-tranh-doremon-333102-13.jpg', NULL),
(417, 18, '20250323_140047_nhasachmienphi-truyen-tranh-doremon-333102-12.jpg', NULL),
(418, 18, '20250323_140047_nhasachmienphi-truyen-tranh-doremon-333102-11.jpg', NULL),
(419, 18, '20250323_140047_nhasachmienphi-truyen-tranh-doremon-333102-10.jpg', NULL),
(420, 18, '20250323_140047_nhasachmienphi-truyen-tranh-doremon-333102-9.jpg', NULL),
(421, 18, '20250323_140047_nhasachmienphi-truyen-tranh-doremon-333102-8.jpg', NULL),
(422, 18, '20250323_140047_nhasachmienphi-truyen-tranh-doremon-333102-7.jpg', NULL),
(423, 18, '20250323_140047_nhasachmienphi-truyen-tranh-doremon-333102-6.jpg', NULL),
(424, 18, '20250323_140047_nhasachmienphi-truyen-tranh-doremon-333102-5.jpg', NULL),
(425, 18, '20250323_140047_nhasachmienphi-truyen-tranh-doremon-333102-4.jpg', NULL),
(438, 19, '20250323_141045_nhasachmienphi-tham-tu-lung-danh-conan-ban-dep-gosho-aoyama-333616-11.jpg', NULL),
(439, 19, '20250323_141045_nhasachmienphi-tham-tu-lung-danh-conan-ban-dep-gosho-aoyama-333616-10.jpg', NULL),
(440, 19, '20250323_141045_nhasachmienphi-tham-tu-lung-danh-conan-ban-dep-gosho-aoyama-333616-9.jpg', NULL),
(441, 19, '20250323_141045_nhasachmienphi-tham-tu-lung-danh-conan-ban-dep-gosho-aoyama-333616-8.jpg', NULL),
(442, 19, '20250323_141045_nhasachmienphi-tham-tu-lung-danh-conan-ban-dep-gosho-aoyama-333616-7.jpg', NULL),
(443, 19, '20250323_141045_nhasachmienphi-tham-tu-lung-danh-conan-ban-dep-gosho-aoyama-333616-6.jpg', NULL),
(444, 19, '20250323_141045_nhasachmienphi-tham-tu-lung-danh-conan-ban-dep-gosho-aoyama-333616-5.jpg', NULL),
(445, 19, '20250323_141045_nhasachmienphi-tham-tu-lung-danh-conan-ban-dep-gosho-aoyama-333616-4.jpg', NULL),
(446, 19, '20250323_141045_nhasachmienphi-tham-tu-lung-danh-conan-ban-dep-gosho-aoyama-333616-3.jpg', NULL),
(447, 19, '20250323_141045_nhasachmienphi-tham-tu-lung-danh-conan-ban-dep-gosho-aoyama-333616-2.jpg', NULL),
(448, 19, '20250323_141045_nhasachmienphi-tham-tu-lung-danh-conan-ban-dep-gosho-aoyama-333616-1.jpg', NULL),
(449, 19, '20250323_141045_nhasachmienphi-tham-tu-lung-danh-conan-ban-dep-gosho-aoyama-333616-0.jpg', NULL),
(450, 21, '20250323_141716_20230608_174317_1.jpg', NULL),
(451, 21, '20250323_141716_20230608_174317_2.jpg', NULL),
(452, 21, '20250323_141716_20230608_174317_3.jpg', NULL),
(453, 21, '20250323_141716_20230608_174317_4.jpg', NULL),
(454, 21, '20250323_141716_20230608_174317_5.jpg', NULL),
(455, 21, '20250323_141716_20230608_174317_6.jpg', NULL),
(456, 21, '20250323_141716_20230608_174318_7.jpg', NULL),
(457, 21, '20250323_141716_20230608_174318_8.jpg', NULL),
(458, 21, '20250323_141716_20230608_174804_0.jpg', NULL),
(459, 21, '20250323_141716_20230608_174804_1.jpg', NULL),
(460, 21, '20250323_141716_20230608_174804_2.jpg', NULL),
(461, 21, '20250323_141716_20230608_174804_3.jpg', NULL),
(462, 21, '20250323_141716_20230608_174804_4.jpg', NULL),
(463, 21, '20250323_141716_20230608_174805_5.jpg', NULL),
(464, 21, '20250323_141716_20230608_174805_6.jpg', NULL),
(465, 21, '20250323_141716_20230608_174805_7.jpg', NULL),
(466, 21, '20250323_141716_20230608_174805_8.jpg', NULL),
(467, 21, '20250323_141716_20230608_174805_9.jpg', NULL),
(468, 21, '20250323_141716_20230608_174805_10.jpg', NULL),
(469, 21, '20250323_141716_20230608_174805_11.jpg', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `danhmuc_id` int(11) NOT NULL,
  `danhmuc_ten` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`danhmuc_id`, `danhmuc_ten`) VALUES
(1, 'Manhua'),
(3, 'Manga'),
(4, 'Manhwa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history`
--

CREATE TABLE `history` (
  `history_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `truyen_id` int(11) NOT NULL,
  `viewed_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `history`
--

INSERT INTO `history` (`history_id`, `user_id`, `truyen_id`, `viewed_at`) VALUES
(1, 15, 21, '2025-03-23 20:05:00'),
(2, 15, 21, '2025-03-23 20:07:11'),
(3, 15, 23, '2025-03-23 20:10:04'),
(4, 15, 23, '2025-03-23 20:10:51'),
(5, 15, 23, '2025-03-23 20:11:07'),
(6, 15, 23, '2025-03-23 20:13:36'),
(7, 15, 28, '2025-03-23 20:13:39'),
(8, 15, 28, '2025-03-23 20:17:20'),
(9, 15, 32, '2025-03-23 20:17:31'),
(10, 15, 28, '2025-03-23 20:19:09'),
(11, 15, 28, '2025-03-23 20:19:15'),
(12, 16, 28, '2025-03-23 20:21:34'),
(13, 16, 28, '2025-03-23 20:21:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `truyen`
--

CREATE TABLE `truyen` (
  `truyen_id` int(11) UNSIGNED NOT NULL,
  `truyen_ma` varchar(50) NOT NULL,
  `truyen_ten` mediumtext NOT NULL,
  `truyen_hinhdaidien` mediumtext DEFAULT NULL,
  `truyen_loai` tinyint(4) DEFAULT NULL COMMENT '#1: Tiểu thuyết, #2: Truyện tranh',
  `truyen_theloai` varchar(500) DEFAULT NULL COMMENT 'Kiếm Hiệp;Trinh thám;Lãng mạn ...',
  `truyen_tacgia` varchar(50) DEFAULT NULL,
  `truyen_mota_ngan` text DEFAULT NULL,
  `truyen_ngaydang` datetime NOT NULL DEFAULT current_timestamp(),
  `danhmuc_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Table lưu trữ thông tin về các loại Truyện. Có thể lưu trữ thông tin Truyện Tranh và Tiểu thuyết';

--
-- Đang đổ dữ liệu cho bảng `truyen`
--

INSERT INTO `truyen` (`truyen_id`, `truyen_ma`, `truyen_ten`, `truyen_hinhdaidien`, `truyen_loai`, `truyen_theloai`, `truyen_tacgia`, `truyen_mota_ngan`, `truyen_ngaydang`, `danhmuc_id`) VALUES
(21, 'DRM', 'Doremon', '20250323_132552_doremonbia.jpg', 2, 'Hài kịch, khoa học viễn tưởng', 'Fujiko F. Fujio', '', '2025-03-23 19:25:52', 3),
(22, 'NRT', 'Naruto', '20250323_133738_narutobia.jpg', 1, 'Hài kịch, khoa học viễn tưởng', 'Đang Cập Nhật', '', '2025-03-23 19:37:38', 1),
(23, 'CONAN', 'Conan', '20250323_133852_conanbia.jpg', 2, 'Phiêu lưu, thám hiểm', 'Aoyama Gōshō', '', '2025-03-23 19:38:52', 3),
(24, 'OPICE', 'ĐẢO HẢI TẶC - ONE PIECE', '20250323_133941_onepicebia.jpg', 2, 'Phiêu lưu, thám hiểm', 'Oda Eiichiro', '', '2025-03-23 19:39:41', 1),
(25, 'SL', 'Solo Leveling ', '20250323_134718_sololevbia.jpg', 1, 'Phiêu lưu, thám hiểm', 'Đang Cập Nhật', '', '2025-03-23 19:47:18', 3),
(26, 'KNY', 'Kimetsu No Yaiba Mùa 4', '20250323_134818_kimdsubia.jpg', 2, 'Ngôn tình', 'Nguyễn Văn Đài', '', '2025-03-23 19:48:18', 1),
(27, 'TGPT', 'Black Clover – Thế Giới Pháp Thuật', '20250323_134900_thegioiptbia.jpg', 2, 'Phiêu lưu, thám hiểm', 'Nguyễn Văn Đài', '', '2025-03-23 19:49:00', 3),
(28, 'TT', 'Weathering with You – Đứa Con Của Thời Tiết', '20250323_134942_duaconttbia.jpg', 1, 'Ngôn tình', 'Đang Cập Nhật', '', '2025-03-23 19:49:42', 1),
(29, 'AT', 'Attack on Titan', '20250323_135033_titanbia.jpg', 1, 'Phiêu lưu, thám hiểm', 'Đang Cập Nhật', '', '2025-03-23 19:50:33', 4),
(30, 'Fairy Tail', 'Fairy Tail', '20250323_135109_fialtalbia.jpg', 2, 'Hệ Thống, Kinh Dị, Đô Thị', 'Đang Cập Nhật', '', '2025-03-23 19:51:09', 1),
(31, 'DS', 'Demon Slayer – Thanh Gươm Diệt Quỷ', '20250323_135315_tgdq.jpg', 2, 'Phiêu lưu, thám hiểm', 'Đang Cập Nhật', '', '2025-03-23 19:53:15', 1),
(32, 'HH', 'Overlord', '20250323_141618_20230608_174317_0.jpg', 2, 'Phiêu lưu, thám hiểm', 'Aoyama Gōshō', '', '2025-03-23 20:16:18', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` enum('admin','member') DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`, `role`, `avatar`) VALUES
(15, '2', '$2y$10$wghpM82LVcbFxRyvjhWzF.nncg2A1.YLNP0FB58t8flxnW458r2kG', '2@gmail.com', 'admin', 'uploads/avatar/67e00a30d503f.jpg'),
(16, '1', '$2y$10$Q73rGqzxcx4lA5jll/cWuOjBDIbspFQwRgvnhITVH8KhkM1c8JBSe', '1@gmail.com', 'member', 'uploads/avatar/avatarmd.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chuong`
--
ALTER TABLE `chuong`
  ADD PRIMARY KEY (`chuong_id`),
  ADD KEY `FK_chuong_truyen` (`truyen_id`);

--
-- Chỉ mục cho bảng `chuong_hinhanh`
--
ALTER TABLE `chuong_hinhanh`
  ADD PRIMARY KEY (`chuong_hinhanh_id`),
  ADD KEY `FK_chuong_hinhanh_chuong` (`chuong_id`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`danhmuc_id`);

--
-- Chỉ mục cho bảng `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`history_id`);

--
-- Chỉ mục cho bảng `truyen`
--
ALTER TABLE `truyen`
  ADD PRIMARY KEY (`truyen_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chuong`
--
ALTER TABLE `chuong`
  MODIFY `chuong_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `chuong_hinhanh`
--
ALTER TABLE `chuong_hinhanh`
  MODIFY `chuong_hinhanh_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=470;

--
-- AUTO_INCREMENT cho bảng `history`
--
ALTER TABLE `history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `truyen`
--
ALTER TABLE `truyen`
  MODIFY `truyen_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chuong`
--
ALTER TABLE `chuong`
  ADD CONSTRAINT `FK_chuong_truyen` FOREIGN KEY (`truyen_id`) REFERENCES `truyen` (`truyen_id`);

--
-- Các ràng buộc cho bảng `chuong_hinhanh`
--
ALTER TABLE `chuong_hinhanh`
  ADD CONSTRAINT `FK_chuong_hinhanh_chuong` FOREIGN KEY (`chuong_id`) REFERENCES `chuong` (`chuong_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
