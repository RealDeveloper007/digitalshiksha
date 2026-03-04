<script src="https://cdn.jsdelivr.net/npm/@mux/mux-player" defer></script>

<style>
    /* Prevent unwanted scrolling on mobile */
    @media (max-width: 768px) {
        * {
            -webkit-overflow-scrolling: touch;
        }
        
        body, html {
            overflow-x: hidden !important;
            width: 100% !important;
            max-width: 100% !important;
            position: relative;
            touch-action: pan-y;
            overscroll-behavior: contain;
        }
        
        .container-fluid {
            overflow-x: hidden;
            width: 100%;
            max-width: 100%;
            margin: 0;
            padding: 0;
        }
        
        section {
            overflow-x: hidden;
            width: 100%;
            max-width: 100%;
        }
    }
    
    /* Modern Video Details Page - Split Layout */
    .secPad {
        padding: 90px 0 40px 0;
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        min-height: 100vh;
        position: relative;
        z-index: 1;
        margin-top: 0;
        overflow-x: hidden;
        width: 100%;
        max-width: 100%;
    }
    
    .video-details-container {
        display: flex;
        gap: 20px;
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 15px;
        position: relative;
        z-index: 1;
        width: 100%;
        overflow-x: hidden;
    }
    
    /* Left Side - Video Player */
    .video-player-section {
        flex: 1;
        min-width: 0;
        /* margin-top: 96px; */
    }
    
    .video-player-wrapper {
        background: #fff;
        border-radius: 16px;
        padding: 20px;
        box-shadow: 0 6px 25px rgba(0,0,0,0.08);
        border: 1px solid rgba(241, 185, 0, 0.2);
        margin-bottom: 20px;
        position: sticky;
        top: 100px;
    }
    
    .video-player-header {
        margin-bottom: 15px;
    }
    
    .video-player-header h3 {
        font-size: 20px;
        font-weight: 700;
        color: #2c3e50;
        margin: 0 0 8px 0;
        line-height: 1.4;
        word-wrap: break-word;
        overflow-wrap: break-word;
    }
    
    .video-player-header p {
        font-size: 14px;
        color: #7f8c8d;
        margin: 0;
        line-height: 1.5;
        word-wrap: break-word;
        overflow-wrap: break-word;
    }
    
    .video-container {
        position: relative;
        width: 100%;
        padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
        background: #000;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    }
    
    .video-container iframe,
    .video-container mux-player {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: none;
    }
    
    /* Ensure Mux player controls are visible on mobile */
    mux-player {
        --controls-background: rgba(0, 0, 0, 0.7);
        --controls-padding: 12px;
    }
    
    @media (max-width: 768px) {
        mux-player {
            --controls-background: rgba(0, 0, 0, 0.8);
            --controls-padding: 10px;
        }
        
        mux-player::part(control-bar) {
            display: flex !important;
        }
        
        mux-player::part(pip-button) {
            display: inline-flex !important;
        }
    }
    
    .video-placeholder {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: #fff;
        font-size: 18px;
        text-align: center;
        padding: 20px;
    }
    
    /* Right Side - Lesson Tabs */
    .lessons-section {
        width: 400px;
        min-width: 350px;
    }
    
    .lessons-header {
        background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%);
        color: #fff;
        border-radius: 16px;
        padding: 20px;
    margin-bottom: 20px;
        box-shadow: 0 6px 25px rgba(241, 185, 0, 0.3);
    }
    
    .lessons-header h2 {
        font-size: 22px;
        font-weight: 700;
        margin: 0 0 8px 0;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .lessons-header p {
        margin: 0;
        font-size: 14px;
        opacity: 0.95;
    }
    
    .lessons-tabs {
        background: #fff;
        border-radius: 16px;
        padding: 15px;
        box-shadow: 0 6px 25px rgba(0,0,0,0.08);
        border: 1px solid rgba(241, 185, 0, 0.2);
        max-height: calc(100vh - 250px);
        overflow-y: auto;
    }
    
    .lesson-tab {
        margin-bottom: 15px;
        border: 1px solid #e0e0e0;
        border-radius: 12px;
        overflow: hidden;
        transition: all 0.3s ease;
    }
    
    .lesson-tab.active {
        border-color: #F1B900;
        box-shadow: 0 4px 12px rgba(241, 185, 0, 0.2);
    }
    
    .lesson-tab-header {
        background: linear-gradient(135deg, #F1B900 0%, #ff8c00 100%);
        padding: 15px 20px;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: all 0.3s ease;
    }
    
    .lesson-tab-header:hover {
        background: linear-gradient(135deg, #ff8c00 0%, #F1B900 100%);
    }
    
    .lesson-tab-header h4 {
        margin: 0;
        color: #fff;
        font-size: 16px;
        font-weight: 600;
        flex: 1;
    }
    
    .lesson-tab-toggle {
        color: #fff;
        font-size: 18px;
        transition: transform 0.3s ease;
    }
    
    .lesson-tab.active .lesson-tab-toggle {
        transform: rotate(180deg);
    }
    
    .lesson-tab-content {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease;
        background: #fff;
    }
    
    .lesson-tab.active .lesson-tab-content {
        max-height: 2000px;
    }
    
    .episode-item {
        padding: 15px 20px;
        border-bottom: 1px solid #f0f0f0;
        transition: all 0.3s ease;
    }
    
    .episode-item:last-child {
        border-bottom: none;
    }
    
    .episode-item:hover {
        background: #f8f9fa;
    }
    
    .episode-item.active {
        background: #fff9e6;
        border-left: 4px solid #F1B900;
    }
    
    .episode-header {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        margin-bottom: 10px;
    }
    
    .episode-checkbox {
        margin-top: 3px;
        width: 20px;
        height: 20px;
        cursor: pointer;
        accent-color: #F1B900;
    }
    
    .episode-title {
        flex: 1;
        font-size: 14px;
        font-weight: 600;
        color: #2c3e50;
        line-height: 1.5;
        cursor: pointer;
        user-select: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
    }
    
    .episode-title:hover {
        color: #F1B900;
    }
    
    .watch-btn {
        cursor: pointer;
    }
    
    .episode-actions {
        display: flex;
        gap: 8px;
        margin-top: 10px;
        flex-wrap: wrap;
    }
    
    .episode-btn {
        padding: 6px 12px;
        border: 1px solid #e0e0e0;
        background: #fff;
        border-radius: 6px;
        font-size: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        color: #2c3e50;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }
    
    .episode-btn:hover {
        background: #F1B900;
        color: #fff;
        border-color: #F1B900;
        text-decoration: none;
    }
    
    .episode-btn i {
        font-size: 12px;
    }
    
    /* Scrollbar Styling */
    .lessons-tabs::-webkit-scrollbar {
        width: 8px;
    }
    
    .lessons-tabs::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }
    
    .lessons-tabs::-webkit-scrollbar-thumb {
        background: #F1B900;
        border-radius: 10px;
    }
    
    .lessons-tabs::-webkit-scrollbar-thumb:hover {
        background: #ff8c00;
    }
    
    /* Responsive Design */
    @media (max-width: 1024px) {
        .video-details-container {
            flex-direction: column;
        }
        
        .lessons-section {
            width: 100%;
            min-width: 0;
        }
        
        .video-player-wrapper {
            position: relative;
            top: 0;
        }
        
        .video-player-section {
            margin-top: 30px;
        }
    }
    
    @media (max-width: 768px) {
        body {
            overflow-x: hidden;
            width: 100%;
            max-width: 100%;
            position: relative;
        }
        
        html {
            overflow-x: hidden;
            width: 100%;
            max-width: 100%;
        }
        
        .secPad {
            padding: 140px 0 30px 0;
            margin-top: 0;
            scroll-margin-top: 120px;
            overflow-x: hidden;
            width: 100%;
            max-width: 100%;
            position: relative;
        }
        
        .video-details-container {
            padding: 0 10px;
            gap: 15px;
            margin-top: 0;
            overflow-x: hidden;
            width: 100%;
            max-width: 100%;
        }
        
        .video-player-wrapper {
            padding: 15px;
            margin-top: 0;
        }
        
        .video-player-section {
            margin-top: 100px;
        }
        
        .video-player-header {
            margin-bottom: 12px;
        }
        
        .video-player-header h3 {
            font-size: 16px;
            line-height: 1.3;
            margin: 0 0 6px 0;
            word-break: break-word;
            hyphens: auto;
        }
        
        .video-player-header p {
            font-size: 12px;
            line-height: 1.4;
        }
        
        .lessons-header {
            display: none;
        }
        
        .lesson-tab-header {
            padding: 12px 15px;
        }
        
        .lesson-tab-header h4 {
            font-size: 14px;
        }
        
        .episode-item {
            padding: 12px 15px;
        }
        
        .episode-title {
            font-size: 13px;
        }
        
        .lessons-tabs {
            max-height: none;
        }
    }
    
    @media (max-width: 480px) {
        body {
            overflow-x: hidden;
            width: 100%;
            max-width: 100%;
            position: relative;
        }
        
        html {
            overflow-x: hidden;
            width: 100%;
            max-width: 100%;
        }
        
        .secPad {
            padding: 130px 0 20px 0;
            margin-top: 0;
            scroll-margin-top: 110px;
            overflow-x: hidden;
            width: 100%;
            max-width: 100%;
            position: relative;
        }
        
        .video-details-container {
            padding: 0 8px;
            gap: 12px;
            margin-top: 0;
            overflow-x: hidden;
            width: 100%;
            max-width: 100%;
        }
        
        .video-player-wrapper {
            padding: 12px;
            margin-top: 0;
        }
        
        .video-player-section {
            margin-top: 100px;
        }
        
        .video-player-header {
            margin-bottom: 10px;
        }
        
        .video-player-header h3 {
            font-size: 14px;
            line-height: 1.3;
            margin: 0 0 5px 0;
        }
        
        .video-player-header p {
            font-size: 11px;
            line-height: 1.4;
        }
        
        .lessons-header {
            display: none;
        }
        
        .episode-actions {
            flex-direction: column;
        }
        
        .episode-btn {
            width: 100%;
            justify-content: center;
        }
  }
</style>

<section class="secPad">
    <div class="container-fluid">
        <div class="video-details-container">
            <!-- Left Side - Video Player -->
            <div class="video-player-section">
                <div class="video-player-wrapper">
                    <div class="video-player-header">
                        <h3 id="current-episode-title">Loading...</h3>
                        <p id="current-episode-subtitle">Please wait</p>
                    </div>
                    <div class="video-container" id="video-container">
                        <div class="video-placeholder">
                <div>
                                <i class="fa fa-spinner fa-spin" style="font-size: 48px; margin-bottom: 10px;"></i>
                                <p>Loading video...</p>
                            </div>
                        </div>
                    </div>
        </div>
    </div>

            <!-- Right Side - Lesson Tabs -->
            <div class="lessons-section">
                <div class="lessons-header">
                    <h2><i class="fa fa-list" style="margin-right: 8px;"></i> Course Lessons</h2>
                    <p><i class="fa fa-video" style="margin-right: 6px;"></i> <?php echo count($syllabus_questions); ?> Episodes Available</p>
              </div>

                <div class="lessons-tabs">
                    <?php if (!empty($lessons)): ?>
                        <?php foreach ($lessons as $lesson): ?>
                            <div class="lesson-tab <?php echo $lesson['lesson_number'] == 1 ? 'active' : ''; ?>" data-lesson="<?php echo $lesson['lesson_number']; ?>">
                                <div class="lesson-tab-header" onclick="toggleLesson(<?php echo $lesson['lesson_number']; ?>)">
                                    <h4><?php echo htmlspecialchars($lesson['lesson_name']); ?></h4>
                                    <i class="fa fa-chevron-down lesson-tab-toggle"></i>
                                </div>
                                <div class="lesson-tab-content">
                                    <?php foreach ($lesson['episodes'] as $episode): ?>
                                        <div class="episode-item" 
                                             data-episode-id="<?php echo $episode['id']; ?>" 
                                             data-video-url="<?php echo htmlspecialchars($episode['video_url']); ?>" 
                                             data-is-mux="<?php echo $episode['is_mux'] ? '1' : '0'; ?>"
                                             data-episode-title="<?php echo htmlspecialchars($episode['title']); ?>"
                                             data-episode-number="<?php echo $episode['episode_number']; ?>">
                                            <div class="episode-header">
                                                <input type="checkbox" 
                                                       class="episode-checkbox" 
                                                       id="episode-<?php echo $episode['id']; ?>"
                                                       data-episode-id="<?php echo $episode['id']; ?>">
                                                <div class="episode-title" style="cursor: pointer;">
                                                    <strong>Episode <?php echo $episode['episode_number']; ?>:</strong> <?php echo htmlspecialchars($episode['title']); ?>
                                                </div>
                                            </div>
                                            <div class="episode-actions">
                                                <a href="javascript:void(0);" 
                                                   class="episode-btn watch-btn" 
                                                   data-episode-id="<?php echo $episode['id']; ?>">
                                                    <i class="fa fa-play"></i> Watch
                                                </a>
                                                <?php if (!empty($episode['pdf_file'])): ?>
                                                    <a href="<?php echo base_url('uploads/pdf_files/' . $episode['pdf_file']); ?>" 
                                                       class="episode-btn" 
                                                       target="_blank">
                                                        <i class="fa fa-file-pdf"></i> PDF
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div style="padding: 20px; text-align: center; color: #7f8c8d;">
                            <i class="fa fa-info-circle" style="font-size: 48px; margin-bottom: 15px; display: block;"></i>
                            <p>No episodes available yet.</p>
            </div>
                    <?php endif; ?>
                </div>
		</div>
      </div>
  </div>
</section>

<script>
    let currentVideoPlayer = null;
    
    function toggleLesson(lessonNumber) {
        const lessonTab = document.querySelector(`.lesson-tab[data-lesson="${lessonNumber}"]`);
        const isActive = lessonTab.classList.contains('active');
        
        // Close all other lessons
        document.querySelectorAll('.lesson-tab').forEach(tab => {
            tab.classList.remove('active');
        });
        
        // Toggle current lesson
        if (!isActive) {
            lessonTab.classList.add('active');
        }
    }
    
    function loadEpisode(episodeId, title, videoUrl, isMux) {
        // Validate inputs
        if (!episodeId || !title || !videoUrl) {
            return;
        }
        
        // Update active episode
        document.querySelectorAll('.episode-item').forEach(item => {
            item.classList.remove('active');
        });
        const episodeItem = document.querySelector(`.episode-item[data-episode-id="${episodeId}"]`);
        if (episodeItem) {
            episodeItem.classList.add('active');
        }
        
        // Update header
        const titleElement = document.getElementById('current-episode-title');
        const subtitleElement = document.getElementById('current-episode-subtitle');
        if (titleElement) {
            titleElement.textContent = title;
        }
        if (subtitleElement) {
            subtitleElement.textContent = 'Episode ' + episodeId;
        }
        
        // Clear previous video
        const videoContainer = document.getElementById('video-container');
        videoContainer.innerHTML = '';
        
        // Extract clean video key from URL or use as-is
        let cleanVideoKey = videoUrl.trim();
        const originalVideoUrl = videoUrl.trim();
        
        // SIMPLIFIED LOGIC: Extract the actual video key
        // If it's a plain key (no http), use it directly after cleaning
        if (!cleanVideoKey.includes('http')) {
            // Plain key - just clean whitespace and invalid chars
            cleanVideoKey = cleanVideoKey.replace(/[^a-zA-Z0-9_-]/g, '');
        } else {
            // It's a URL - extract the key
            if (cleanVideoKey.includes('youtube.com') || cleanVideoKey.includes('youtu.be')) {
                // Extract YouTube ID from URL
                const youtubeMatch = cleanVideoKey.match(/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/);
                if (youtubeMatch && youtubeMatch[1]) {
                    cleanVideoKey = youtubeMatch[1];
                } else {
                    // Fallback: extract any 11-char sequence
                    const fallbackMatch = cleanVideoKey.match(/([a-zA-Z0-9_-]{11})/);
                    if (fallbackMatch && fallbackMatch[1]) {
                        cleanVideoKey = fallbackMatch[1];
                    }
                }
            } else if (cleanVideoKey.includes('mux.com') || cleanVideoKey.includes('stream.mux.com')) {
                // Extract Mux playback ID from URL
                const muxMatch = cleanVideoKey.match(/\/([a-zA-Z0-9]{20,})(?:\/|$|\?|#)/);
                if (muxMatch && muxMatch[1]) {
                    cleanVideoKey = muxMatch[1];
                } else {
                    // Try last segment
                    const parts = cleanVideoKey.split('/');
                    const lastPart = parts[parts.length - 1].split('?')[0].split('#')[0];
                    if (lastPart.length >= 20 && /^[a-zA-Z0-9]+$/.test(lastPart)) {
                        cleanVideoKey = lastPart;
                    }
                }
            } else {
                // Generic URL - try to extract key from path
                try {
                    const urlObj = new URL(cleanVideoKey);
                    const pathParts = urlObj.pathname.split('/').filter(p => p);
                    if (pathParts.length > 0) {
                        const lastPart = pathParts[pathParts.length - 1];
                        if (lastPart.length >= 20 && /^[a-zA-Z0-9]+$/.test(lastPart)) {
                            cleanVideoKey = lastPart; // Mux ID
                        } else if (lastPart.length === 11 && /^[a-zA-Z0-9_-]+$/.test(lastPart)) {
                            cleanVideoKey = lastPart; // YouTube ID
                        }
                    }
                } catch (e) {
                    // Simple extraction
                    const simpleExtract = cleanVideoKey.replace(/^https?:\/\//, '').replace(/^.*\//, '').split('?')[0].split('#')[0];
                    if (simpleExtract && (simpleExtract.length >= 20 || simpleExtract.length === 11)) {
                        cleanVideoKey = simpleExtract.replace(/[^a-zA-Z0-9_-]/g, '');
                    }
                }
            }
        }
        
        // Final cleanup - remove any remaining invalid characters
        cleanVideoKey = cleanVideoKey.replace(/[^a-zA-Z0-9_-]/g, '');
        
        // Determine player type based on key length (PRIMARY METHOD)
        // Long keys (20+ characters) = Mux player
        // Short keys (11 characters typically) = YouTube player
        const keyLength = cleanVideoKey.length;
        const useMuxPlayer = keyLength >= 20;
        
        
        // Load new video
        if (useMuxPlayer) {
            // MUX PLAYER - Long key (20+ characters)
            let playbackId = cleanVideoKey;
            
            // Ensure it's a valid playback ID format (alphanumeric only)
            if (!/^[a-zA-Z0-9]+$/.test(playbackId)) {
                // Clean up any remaining invalid characters
                playbackId = playbackId.replace(/[^a-zA-Z0-9]/g, '');
            }
            
            // Validate playback ID length
            if (playbackId.length < 20) {
                videoContainer.innerHTML = '<div class="video-placeholder"><div><i class="fa fa-exclamation-triangle" style="font-size: 48px; margin-bottom: 10px;"></i><p>Invalid Mux video ID</p></div></div>';
                return;
            }
            
            const muxPlayer = document.createElement('mux-player');
            muxPlayer.setAttribute('playback-id', playbackId);
            muxPlayer.setAttribute('metadata-video-title', title);
            muxPlayer.setAttribute('metadata-viewer-user-id', '<?php echo isset($user_id) ? $user_id : "guest"; ?>');
            muxPlayer.setAttribute('stream-type', 'on-demand');
            muxPlayer.setAttribute('controls', ''); // Enable controls
            muxPlayer.setAttribute('default-show-metadata', 'false'); // Hide metadata by default
            muxPlayer.setAttribute('prefer-playback', 'mse'); // Prefer MSE for better compatibility
            muxPlayer.setAttribute('playsinline', ''); // Enable inline playback on mobile
            muxPlayer.setAttribute('pip', ''); // Enable picture-in-picture
            muxPlayer.style.width = '100%';
            muxPlayer.style.height = '100%';
            
            // Enable pip programmatically for better mobile support
            if (muxPlayer.requestPictureInPicture && document.pictureInPictureEnabled) {
                // Browser supports pip
                muxPlayer.addEventListener('loadedmetadata', function() {
                    // Ensure pip is available
                    if (muxPlayer.controls) {
                        muxPlayer.controls = true;
                    }
                });
            }
            
            videoContainer.appendChild(muxPlayer);
            currentVideoPlayer = muxPlayer;
            
        } else {
            // YOUTUBE PLAYER - Short key (typically 11 characters)
            let youtubeId = cleanVideoKey;
            
            // If we have a clean key that's 11 chars, use it directly
            if (youtubeId.length === 11 && /^[a-zA-Z0-9_-]+$/.test(youtubeId)) {
                // Perfect! Use it as-is
            } else if (youtubeId.length !== 11) {
                // Try to extract from original URL if cleaning didn't work
                const originalUrl = videoUrl.trim();
                if (originalUrl.includes('youtube.com') || originalUrl.includes('youtu.be')) {
                    const regExp = /(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/;
                    const match = originalUrl.match(regExp);
                    if (match && match[1]) {
                        youtubeId = match[1];
                    }
                }
                
                // If still not 11 chars, try to extract any 11-char alphanumeric sequence from original
                if (youtubeId.length !== 11) {
                    const idMatch = originalUrl.match(/([a-zA-Z0-9_-]{11})/);
                    if (idMatch && idMatch[1]) {
                        youtubeId = idMatch[1];
                    }
                }
            }
            
            // Final validation - YouTube ID must be exactly 11 characters
            if (youtubeId.length !== 11 || !/^[a-zA-Z0-9_-]+$/.test(youtubeId)) {
                videoContainer.innerHTML = '<div class="video-placeholder"><div><i class="fa fa-exclamation-triangle" style="font-size: 48px; margin-bottom: 10px;"></i><p>Invalid YouTube video ID: ' + youtubeId + '</p><p style="font-size: 12px; margin-top: 10px;">Expected 11 characters, got ' + youtubeId.length + '</p></div></div>';
                return;
            }
            
            // Create YouTube iframe without autoplay
            const iframe = document.createElement('iframe');
            // Build YouTube embed URL without autoplay
            const youtubeEmbedUrl = `https://www.youtube.com/embed/${youtubeId}?rel=0&enablejsapi=1&modestbranding=1&playsinline=1&controls=1&origin=${encodeURIComponent(window.location.origin)}`;
            
            iframe.src = youtubeEmbedUrl;
            iframe.setAttribute('frameborder', '0');
            iframe.setAttribute('allow', 'accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share');
            iframe.setAttribute('allowfullscreen', '');
            iframe.setAttribute('loading', 'eager');
            iframe.setAttribute('id', 'youtube-player-' + episodeId);
            iframe.setAttribute('title', 'YouTube video player: ' + title);
            iframe.style.width = '100%';
            iframe.style.height = '100%';
            iframe.style.border = 'none';
            iframe.style.display = 'block';
            iframe.style.position = 'absolute';
            iframe.style.top = '0';
            iframe.style.left = '0';
            
            // Clear container and add iframe
            videoContainer.innerHTML = '';
            videoContainer.appendChild(iframe);
            currentVideoPlayer = iframe;
            
            // Set up error listener
            iframe.addEventListener('error', function() {
                videoContainer.innerHTML = '<div class="video-placeholder"><div><i class="fa fa-exclamation-triangle" style="font-size: 48px; margin-bottom: 10px;"></i><p>Error loading YouTube video</p><p style="font-size: 12px; margin-top: 10px;">Please check your internet connection</p></div></div>';
            });
        }
        
        // Scroll to top of video player on mobile
        if (window.innerWidth <= 1024) {
            setTimeout(() => {
                document.querySelector('.video-player-section').scrollIntoView({ behavior: 'smooth', block: 'start' });
            }, 300);
        }
    }
    
    function markEpisodeComplete(episodeId, isComplete) {
        // Save to localStorage immediately for better UX
        try {
            const savedCompletions = JSON.parse(localStorage.getItem('episode_completions') || '{}');
            savedCompletions[episodeId] = isComplete ? 1 : 0;
            localStorage.setItem('episode_completions', JSON.stringify(savedCompletions));
        } catch (e) {
            // Silent error handling
        }
        
        // Send AJAX request to save completion status to server
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '<?php echo base_url("syllabus_control/mark_episode_complete"); ?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Silent success handling
            }
        };
        xhr.send('episode_id=' + episodeId + '&completed=' + (isComplete ? '1' : '0'));
    }
    
    // Event delegation for episode clicks
    function setupEpisodeEventListeners() {
        // Handle checkbox changes
        document.addEventListener('change', function(e) {
            if (e.target.classList.contains('episode-checkbox')) {
                const episodeId = e.target.getAttribute('data-episode-id');
                const isComplete = e.target.checked;
                markEpisodeComplete(episodeId, isComplete);
            }
        });
        
        // Handle Watch button clicks
        document.addEventListener('click', function(e) {
            const watchBtn = e.target.closest('.watch-btn');
            if (watchBtn) {
                e.preventDefault();
                e.stopPropagation();
                const episodeId = watchBtn.getAttribute('data-episode-id');
                const episodeItem = document.querySelector(`.episode-item[data-episode-id="${episodeId}"]`);
                if (episodeItem) {
                    const videoUrl = episodeItem.getAttribute('data-video-url');
                    const title = episodeItem.getAttribute('data-episode-title');
                    const isMux = episodeItem.getAttribute('data-is-mux') === '1';
                    loadEpisode(episodeId, title, videoUrl, isMux);
                }
            }
        });
        
        // Handle episode title clicks (but not if clicking on checkbox or watch button)
        document.addEventListener('click', function(e) {
            // Skip if clicking on checkbox, watch button, or their children
            if (e.target.closest('.episode-checkbox') || 
                e.target.closest('.watch-btn') || 
                e.target.closest('.episode-actions')) {
                return;
            }
            
            const titleElement = e.target.closest('.episode-title');
            if (titleElement) {
                e.preventDefault();
                e.stopPropagation();
                const episodeItem = titleElement.closest('.episode-item');
                if (episodeItem) {
                    const episodeId = episodeItem.getAttribute('data-episode-id');
                    const videoUrl = episodeItem.getAttribute('data-video-url');
                    const title = episodeItem.getAttribute('data-episode-title');
                    const isMux = episodeItem.getAttribute('data-is-mux') === '1';
                    loadEpisode(episodeId, title, videoUrl, isMux);
                }
            }
        });
    }
    
    // Load first episode by default
    document.addEventListener('DOMContentLoaded', function() {
        // Setup event listeners
        setupEpisodeEventListeners();
        
        // Load saved completion states from localStorage (client-side storage)
        try {
            const savedCompletions = JSON.parse(localStorage.getItem('episode_completions') || '{}');
            Object.keys(savedCompletions).forEach(function(episodeId) {
                const checkbox = document.getElementById('episode-' + episodeId);
                if (checkbox) {
                    checkbox.checked = savedCompletions[episodeId] == 1;
                }
            });
        } catch (e) {
            // Silent error handling
        }
        
        // Load first episode video (but don't autoplay)
        const firstEpisode = document.querySelector('.episode-item');
        if (firstEpisode) {
            const episodeId = firstEpisode.getAttribute('data-episode-id');
            const title = firstEpisode.getAttribute('data-episode-title') || 'Episode 1';
            const videoUrl = firstEpisode.getAttribute('data-video-url');
            const isMux = firstEpisode.getAttribute('data-is-mux') === '1';
            
            // Load the first video (will be paused, not autoplaying)
            loadEpisode(episodeId, title, videoUrl, isMux);
        }
    });
</script>
