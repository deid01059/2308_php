<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/view/css/common.css">
	<title><?php echo $this->titleBoardName ?>페이지</title>
</head>
<body>
    <header>
        <?php require_once("view/inc/header.php"); ?>
    </header>
	<div class="text-center mt-5 mb-5">
		<h1><?php echo $this->titleBoardName ?></h1>
		<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-patch-plus-fill" viewBox="0 0 16 16" data-bs-toggle="modal" data-bs-target="#modalInsert" >
			<path class="list_insert_btn" d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zM8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0z"/>
		</svg>
	</div>

    <main>
		<?php
			foreach($this->arrBoardInfo as $item){
		?>
			<div class="card" >
				<img src="<?php echo isset($item["b_img"]) ? "/"._PATH_USERIMG.$item["b_img"] : ""; ?>" class="card-img-top" alt="이미지없음">
				<div class="card-body">
					<h5 class="card-title"><?php echo $item["b_title"] ?></h5>
					<p class="card-text"><?php echo mb_substr($item["b_content"], 0, 10)."..."; ?></p>
					<!-- <button id="btnDetail" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDetail">상세</button>  : 기존 상세 버튼 -->
					<button id="btnDetail" class="btn btn-primary" onclick="openDetail(<?php echo $item['id'] ?>); return false">상세</button>
				</div>
			</div>
		<?php		
			}
		?>
	</main>

	<!-- 상세모달 -->
	<div class="modal fade" id="modalDetail" tabindex="-1">
		<div class="modal-dialog modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="b_title">개발자 입니다</h5>
					<button type="button" onclick="closeModal(); return false;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body te">
					<p id="created_at">작성일자</p>
					<p id="updated_at">수정일자</p>
					<p id="b_content">내용</p>
					<img src="" alt="..." style="margin: 0 auto;" id="b_img">
				</div>
				<div class="modal-footer">
					<button type="button" onclick="closeModal(); return false;" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
				</div>
			</div>
		</div>
	</div>
	
	<!-- 작성모달 -->
	<div class="modal fade" id="modalInsert" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="/board/add" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="b_type" value="<?php echo $this->boardType; ?>">
					<div class="modal-header">
						<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="제목을 입력하세요" name="b_title">
					</div>
					<div class="modal-body te">
						<textarea name="b_content" class="form-control" id="" cols="30" rows="10" placeholder="내용을 입력하세요"></textarea>
						<br><br>
						<input type="file" accept="image/*" name="b_img">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
						<button type="submit" class="btn btn-primary" data-bs-dismiss="modal">작성</button>
					</div>
				</form>
			</div>
		</div>
	</div>

    <footer class="fixed-bottom bg-dark text-light text-center p-3">
        저작권
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="/view/js/common.js"></script>
</body>
</html>