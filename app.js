// Sample posts data
const samplePosts = [
    {
        id: 1,
        username: 'devguru',
        avatar: 'DG',
        image: '💻',
        caption: 'Just deployed my first Kubernetes cluster! #devops #k8s'
    },
    {
        id: 2,
        username: 'codewizard',
        avatar: 'CW',
        image: '🚀',
        caption: 'New React component library released! Check it out on npm #react #opensource'
    },
    {
        id: 3,
        username: 'pythonista',
        avatar: 'PY',
        image: '🐍',
        caption: 'Built an AI model that predicts code bugs with 95% accuracy! #python #machinelearning'
    },
    {
        id: 4,
        username: 'rustacean',
        avatar: 'RS',
        image: '🦀',
        caption: 'Rust is the future! Memory safety without garbage collection #rustlang #systems'
    },
    {
        id: 5,
        username: 'fullstacker',
        avatar: 'FS',
        image: '🔧',
        caption: 'Finished building a full-stack app with Next.js and PostgreSQL #webdev #typescript'
    }
];

// Storage for snatched posts
let snatchedPosts = JSON.parse(localStorage.getItem('snatchedPosts') || '[]');

// Initialize the app
document.addEventListener('DOMContentLoaded', () => {
    renderFeed();
    updateSnatchCount();
    setupEventListeners();
});

function setupEventListeners() {
    // Toggle between feed and snatched view
    document.getElementById('snatched-link').addEventListener('click', (e) => {
        e.preventDefault();
        toggleSnatchedView();
    });
}

function renderFeed() {
    const feedContainer = document.getElementById('feed');
    feedContainer.innerHTML = '';

    samplePosts.forEach(post => {
        const postElement = createPostElement(post);
        feedContainer.appendChild(postElement);
    });
}

function createPostElement(post) {
    const isSnatched = snatchedPosts.some(p => p.id === post.id);
    
    const postDiv = document.createElement('div');
    postDiv.className = 'post';
    postDiv.dataset.postId = post.id;

    postDiv.innerHTML = `
        <div class="post-header">
            <div class="avatar">${post.avatar}</div>
            <div class="username">${post.username}</div>
        </div>
        <div class="post-image">${post.image}</div>
        <div class="post-actions">
            <button class="action-btn like-btn" title="Like">❤️</button>
            <button class="action-btn comment-btn" title="Comment">💬</button>
            <button class="action-btn share-btn" title="Share">📤</button>
            <button class="action-btn snatch-btn ${isSnatched ? 'snatched' : ''}" title="Snatch (Save for later)">
                ${isSnatched ? '🔖' : '📑'}
            </button>
        </div>
        <div class="post-caption">
            <span class="username">${post.username}</span>
            ${post.caption}
        </div>
    `;

    // Add snatch button event listener
    const snatchBtn = postDiv.querySelector('.snatch-btn');
    snatchBtn.addEventListener('click', () => toggleSnatch(post, snatchBtn));

    return postDiv;
}

function toggleSnatch(post, button) {
    const index = snatchedPosts.findIndex(p => p.id === post.id);
    
    if (index === -1) {
        // Snatch the post
        snatchedPosts.push(post);
        button.textContent = '🔖';
        button.classList.add('snatched');
        showNotification('Post snatched! 📑');
    } else {
        // Unsnatch the post
        snatchedPosts.splice(index, 1);
        button.textContent = '📑';
        button.classList.remove('snatched');
        showNotification('Post unsnatched');
    }

    // Save to localStorage
    localStorage.setItem('snatchedPosts', JSON.stringify(snatchedPosts));
    updateSnatchCount();

    // Update snatched view if it's currently visible
    if (!document.getElementById('snatched-view').classList.contains('hidden')) {
        renderSnatchedPosts();
    }
}

function updateSnatchCount() {
    document.getElementById('snatch-count').textContent = snatchedPosts.length;
}

function toggleSnatchedView() {
    const feedView = document.getElementById('feed');
    const snatchedView = document.getElementById('snatched-view');

    if (snatchedView.classList.contains('hidden')) {
        // Show snatched view
        feedView.classList.add('hidden');
        snatchedView.classList.remove('hidden');
        renderSnatchedPosts();
    } else {
        // Show feed view
        snatchedView.classList.add('hidden');
        feedView.classList.remove('hidden');
    }
}

function renderSnatchedPosts() {
    const snatchedContainer = document.getElementById('snatched-posts');
    snatchedContainer.innerHTML = '';

    if (snatchedPosts.length === 0) {
        snatchedContainer.innerHTML = `
            <div class="empty-state">
                <div style="font-size: 48px;">📑</div>
                <p>No snatched posts yet</p>
                <p style="font-size: 14px; margin-top: 8px;">Snatch posts to save them for later!</p>
            </div>
        `;
        return;
    }

    snatchedPosts.forEach(post => {
        const postElement = createPostElement(post);
        snatchedContainer.appendChild(postElement);
    });
}

function showNotification(message) {
    // Create a simple notification
    const notification = document.createElement('div');
    notification.textContent = message;
    notification.style.cssText = `
        position: fixed;
        bottom: 20px;
        right: 20px;
        background-color: #262626;
        color: white;
        padding: 12px 24px;
        border-radius: 8px;
        font-size: 14px;
        z-index: 1000;
        animation: slideIn 0.3s ease;
    `;

    // Add animation
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideIn {
            from {
                transform: translateX(400px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
    `;
    document.head.appendChild(style);

    document.body.appendChild(notification);

    // Remove notification after 2 seconds
    setTimeout(() => {
        notification.style.animation = 'slideIn 0.3s ease reverse';
        setTimeout(() => notification.remove(), 300);
    }, 2000);
}
