<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['404_override'] = 'my404';
$route['about'] = 'About_us';
$route['contact'] = 'Contact_us';
$route['mobileapp'] = 'MobileApp';
$route['saveContact'] = 'Contact_us/saveContact';
$route['admin/dtableContact'] = 'Contact_us/contact_table';

$route['post/:num'] = 'Post_Details';
//$route['episode/:num'] = 'Episode';
$route['newsletters'] = 'Newsletters';
$route['newsletters/page'] = 'Newsletters';
$route['newsletters/page/:num'] = 'Newsletters';

$route['category/:num'] = 'Category';
$route['category/:num/page'] = 'Category';
$route['category/:num/page/:num'] = 'Category';

$route['videos'] = 'Video_List';
$route['videos/page'] = 'Video_List';
$route['videos/page/:num'] = 'Video_List';
$route['video/:num'] = 'Video_Show';

$route['programs'] = 'Program';
$route['programs/page'] = 'Program';
$route['programs/page/:num'] = 'Program';
$route['programs_archive'] = 'Program/programArchive';
$route['programs_archive/page'] = 'Program/programArchive';
$route['programs_archive/page/:num'] = 'Program/programArchive';
$route['program/:num'] = 'Program/programName';
$route['program/:num/page'] = 'Program/programName';
$route['program/:num/page/:num'] = 'Program/programName';
$route['program/:num/episode/:num'] = 'Program/episode';

$route['post_tags/:num'] = 'News_Tags';
$route['post_tags/:num/page'] = 'News_Tags';
$route['post_tags/:num/page/:num'] = 'News_Tags';

$route['search'] = 'Search';
$route['search/page'] = 'Search';
$route['search/page/:num'] = 'Search';
//$route['search'] = 'Search/program';
//$route['search/page'] = 'Search/program';
//$route['search/page/:num'] = 'Search/program';
//$route['search'] = 'Search/episode';
//$route['search/page'] = 'Search/episode';
//$route['search/page/:num'] = 'Search/episode';
//$route['search'] = 'Search/video';
//$route['search/page'] = 'Search/video';
//$route['search/page/:num'] = 'Search/video';
//$route['search'] = 'Search/letter';
//$route['search/page'] = 'Search/letter';
//$route['search/page/:num'] = 'Search/letter';

$route['live'] = 'Live';

//admin
$route['admin/dtableCourse'] = 'Course/course_table';
$route['admin/dtableCourse/page'] = 'Course/course_table';
$route['admin/dtableCourse/page/:num'] = 'Course/course_table';
$route['admin/addCourse'] = 'Course/add_course';
$route['admin/saveCourse'] = 'Course/saveCourse';
$route['admin/updateCourse/:num'] = 'Course/updateCourse';
$route['admin/saveUpdateCourse/:num'] = 'Course/saveUpdateCourse';
$route['admin/deleteCourse'] = 'Course/deleteCourse';

$route['admin/course/:num/episodes'] = 'Episode/episode_table';
$route['admin/course/:num/episodes/page'] = 'Episode/episode_table';
$route['admin/course/:num/episodes/page/:num'] = 'Episode/episode_table';

$route['admin/allEpisodes'] = 'Episode/all_episodes';
$route['admin/allEpisodes/page'] = 'Episode/all_episodes';
$route['admin/allEpisodes/page/:num'] = 'Episode/all_episodes';
//$route['admin/dtableEpisode'] = 'Episode/episode_table';
$route['admin/addEpisode'] = 'Episode/add_episode';
$route['admin/saveEpisode'] = 'Episode/saveEpisode';
$route['admin/updateEpisode/:num'] = 'Episode/updateEpisode';
$route['admin/saveUpdateEpisode/:num'] = 'Episode/saveUpdateEpisode';
$route['admin/deleteEpisode'] = 'Episode/deleteEpisode';
$route['admin/orderEpisode'] = 'Episode/orderEpisode';

$route['admin/login'] = 'Login/log';
$route['admin/logout'] = 'Login/logout';
$route['admin/loginpost'] = 'Login/testlogin';
$route['admin/index'] = 'Admin';


$route['admin/dtableAuthor'] = 'Author/author_table';
$route['admin/saveAuthor'] = 'Author/saveAuthor';
$route['admin/addAuthor'] = 'Author/add_author';
$route['admin/updateAuthor/:num'] = 'Author/updateAuthor';
$route['admin/saveUpdateAuthor/:num'] = 'Author/saveUpdateAuthor';
$route['admin/delAuthor'] = 'Author/deleteAuthor';


$route['admin/addInfographic'] = 'Multimedia/add_infographic';
$route['admin/dtableInfographic'] = 'Multimedia/infographic_table';
$route['admin/saveInfographic'] = 'Multimedia/saveInfographic';
$route['admin/updateInfographic/:num'] = 'Multimedia/updateInfographic';
$route['admin/saveUpdateInfographic/:num'] = 'Multimedia/saveUpdateInfographic';
$route['admin/deleteInfographic'] = 'Multimedia/deleteInfographic';

$route['admin/addCaricature'] = 'Multimedia/add_caricature';
$route['admin/dtableCaricature'] = 'Multimedia/caricature_table';
$route['admin/saveCaricature'] = 'Multimedia/saveCaricature';
$route['admin/updateCaricature/:num'] = 'Multimedia/updateCaricature';
$route['admin/saveUpdateCaricature/:num'] = 'Multimedia/saveUpdateCaricature';
$route['admin/deleteCaricature'] = 'Multimedia/deleteCaricature';

$route['admin/addAds'] = 'Advert/add_advert';
$route['admin/saveAdvert'] = 'Advert/saveAdvert';
$route['admin/dtableBanner'] = 'Advert/advert_table';
$route['admin/updateBanner/:num'] = 'Advert/updateAdvert';
$route['admin/saveUpdateBanner/:num'] = 'Advert/saveUpdateAdvert';
$route['admin/deleteBanner'] = 'Advert/deleteAdvert';

$route['admin/addLetter'] = 'Newsletters/add_letter';
$route['admin/saveLetter'] = 'Newsletters/saveLetter';
$route['admin/dtableLetters'] = 'Newsletters/letters_table';
$route['admin/dtableLetters/page'] = 'Newsletters/letters_table';
$route['admin/dtableLetters/page/:num'] = 'Newsletters/letters_table';
$route['admin/updateLetter/:num'] = 'Newsletters/updateLetter';
$route['admin/saveUpdateLetter/:num'] = 'Newsletters/saveUpdateLetter';
$route['admin/deleteLetter'] = 'Newsletters/deleteLetter';


$route['admin/addPrivateFile'] = 'PrivateFiles/add_file';
$route['admin/savePrivateFile'] = 'PrivateFiles/savePrivateFile';
$route['admin/dtablePrivateFiles'] = 'PrivateFiles/files_table';
$route['admin/dtablePrivateFiles/page'] = 'PrivateFiles/files_table';
$route['admin/dtablePrivateFiles/page/:num'] = 'PrivateFiles/files_table';
$route['admin/updatePrivateFile/:num'] = 'PrivateFiles/updatePrivateFile';
$route['admin/saveUpdatePrivateFile/:num'] = 'PrivateFiles/saveUpdatePrivateFile';
$route['admin/deletePrivateFile'] = 'PrivateFiles/deletePrivateFile';

$route['admin/dtableNews'] = 'News/news_table';
$route['admin/addNews'] = 'News/add_news';
$route['admin/saveNews'] = 'News/saveNews';
$route['admin/updateNews/:num'] = 'News/updateNews';
$route['admin/saveUpdateNews/:num'] = 'News/saveUpdateNews';
$route['admin/deleteNews'] = 'News/deleteNews';


$route['admin/dtableBreaknews'] = 'News/breaknews_table';
$route['admin/addBreakNew'] = 'News/add_breaknews';
$route['admin/saveBreaknews'] = 'News/saveBreaknews';
$route['admin/updateBreakNew'] = 'News/updateBreakNew';
$route['admin/deleteBreakNew'] = 'News/deleteBreakNew';

$route['admin/addCurrency'] = 'Currency/add_currency';
$route['admin/saveCurrency'] = 'Currency/saveCurrency';

$route['admin/addSubDept'] = 'NewsClassification/add_subDept';
$route['admin/saveSubDept'] = 'NewsClassification/saveSubDept';
$route['admin/deleteSubDept'] = 'NewsClassification/deleteSubDept';
$route['admin/updateSubDept'] = 'NewsClassification/updateSubDept';

$route['admin/dtableImages'] = 'Multimedia/image_table';
$route['admin/addImages'] = 'Multimedia/add_image';
$route['admin/saveImages'] = 'Multimedia/saveImages';
$route['admin/updateImages/:num'] = 'Multimedia/updateImages';
$route['admin/saveUpdateImages/:num'] = 'Multimedia/saveUpdateImages';
$route['admin/deleteImagesAlbum'] = 'Multimedia/deleteImagesAlbum';

$route['admin/dtableReports'] = 'Multimedia/report_table';
$route['admin/dtableVideos'] = 'Multimedia/video_table';
$route['admin/dtableVideos/page'] = 'Multimedia/video_table';
$route['admin/dtableVideos/page/:num'] = 'Multimedia/video_table';
$route['admin/addVideo'] = 'Multimedia/add_video';
$route['admin/saveVideo'] = 'Multimedia/saveVideo';
$route['admin/updateVideo/:num'] = 'Multimedia/updateVideo';
$route['admin/saveUpdateVideo/:num'] = 'Multimedia/saveUpdateVideo';
$route['admin/deleteVideo'] = 'Multimedia/deleteVideo';

$route['admin/addSubsite'] = 'Subsite/add_Subsite';
$route['admin/saveSubsite'] = 'Subsite/saveSubsite';
$route['admin/dtableSubsite'] = 'Subsite/Subsite_table';
$route['admin/updateSubsite/:num'] = 'Subsite/updateSubsite';
$route['admin/saveUpdateSubsite/:num'] = 'Subsite/saveUpdateSubsite';
$route['admin/deleteSubsite'] = 'Subsite/deleteSubsite';


$route['admin/saveSubMediaDept'] = 'MediaClassification/saveSubMediaDept';
$route['admin/deleteSubMediaDept'] = 'MediaClassification/deleteSubMediaDept';
$route['admin/updateSubMediaDept'] = 'MediaClassification/updateSubMediaDept';


$route['admin/dtableUsers'] = 'User/user_table';
$route['admin/addUser'] = 'User/add_user';
$route['admin/saveUser'] = 'User/saveUser';
$route['admin/updateUser/:num'] = 'User/updateUser';
$route['admin/saveUpdateUser/:num'] = 'User/saveUpdateUser';
$route['admin/deleteUser'] = 'User/deleteUser';

$route['admin/updateInformation'] = 'User/updateInformation';
$route['admin/saveUpdateInformation'] = 'User/saveUpdateInformation';

$route['admin/aboutUs'] = 'About_us/aboutUs';
$route['admin/updateDetails'] = 'About_us/updateDetails';

$route['admin/searchProgram'] = 'Search/s_program';
$route['admin/searchProgram/page'] = 'Search/s_program';
$route['admin/searchProgram/page/:num'] = 'Search/s_program';

$route['getImages'] = 'News/archive2';
$route['load_more_news'] = 'Home/load_more_news';