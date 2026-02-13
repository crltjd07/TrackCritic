-- Create the trackcriticuser table
CREATE TABLE trackcriticuser (
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    LastName VARCHAR(100) NOT NULL,
    GivenName VARCHAR(100) NOT NULL,
    MiddleName VARCHAR(100),
    ExtName VARCHAR(20),
    Email VARCHAR(255) UNIQUE NOT NULL,
    Username VARCHAR(50) UNIQUE NOT NULL,
    UserPassword VARCHAR(255) NOT NULL,
    DateOfBirth DATE,
    CountryID INT,
    CreatedAt DATETIME DEFAULT CURRENT_TIMESTAMP,
    lastsession DATETIME
);

-- Create the feedback table
CREATE TABLE feedback (
    FeedbackID INT AUTO_INCREMENT PRIMARY KEY,
    UserID INT NOT NULL,
    Email VARCHAR(255) NOT NULL,
    Rating INT CHECK (Rating >= 1 AND Rating <= 5),
    Comment TEXT,
    SubmittedAt DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Create the listofcountries table
CREATE TABLE listofcountries (
    CountryID INT AUTO_INCREMENT PRIMARY KEY,
    CountryName VARCHAR(100) NOT NULL UNIQUE
);

-- Create the newslettersubscriber table
CREATE TABLE newslettersubscriber (
    SubscriberID INT AUTO_INCREMENT PRIMARY KEY,
    Email VARCHAR(255) UNIQUE NOT NULL,
    SubscribedAt DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Create the polls table
CREATE TABLE polls (
    poll_id INT AUTO_INCREMENT PRIMARY KEY,
    poll_title VARCHAR(255) NOT NULL,
    poll_description TEXT,
    artist_name VARCHAR(100),
    song_name VARCHAR(100),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    expires_at DATETIME,
    is_active TINYINT(1) DEFAULT 1
);

-- Create the poll_votes table
CREATE TABLE poll_votes (
    vote_id INT AUTO_INCREMENT PRIMARY KEY,
    poll_id INT NOT NULL,
    user_id INT NOT NULL,
    rating INT CHECK (rating >= 1 AND rating <= 10),
    voted_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Add foreign key constraints
ALTER TABLE trackcriticuser 
ADD CONSTRAINT fk_user_country 
FOREIGN KEY (CountryID) REFERENCES listofcountries(CountryID);

ALTER TABLE feedback 
ADD CONSTRAINT fk_feedback_user 
FOREIGN KEY (UserID) REFERENCES trackcriticuser(UserID);

ALTER TABLE poll_votes 
ADD CONSTRAINT fk_vote_poll 
FOREIGN KEY (poll_id) REFERENCES polls(poll_id);

ALTER TABLE poll_votes 
ADD CONSTRAINT fk_vote_user 
FOREIGN KEY (user_id) REFERENCES trackcriticuser(UserID);

-- Add unique constraint to prevent duplicate votes
ALTER TABLE poll_votes 
ADD CONSTRAINT unique_user_poll_vote 
UNIQUE (poll_id, user_id);

-- Create indexes for better performance
CREATE INDEX idx_user_username ON trackcriticuser(Username);
CREATE INDEX idx_user_email ON trackcriticuser(Email);
CREATE INDEX idx_user_country ON trackcriticuser(CountryID);
CREATE INDEX idx_user_created ON trackcriticuser(CreatedAt);
CREATE INDEX idx_feedback_user ON feedback(UserID);
CREATE INDEX idx_feedback_submitted ON feedback(SubmittedAt);
CREATE INDEX idx_poll_active ON polls(is_active);
CREATE INDEX idx_poll_expires ON polls(expires_at);
CREATE INDEX idx_vote_poll ON poll_votes(poll_id);
CREATE INDEX idx_vote_user ON poll_votes(user_id);